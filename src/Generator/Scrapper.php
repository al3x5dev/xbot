<?php

namespace Al3x5\xBot\Generator;

use Al3x5\xBot\Config;

class Scrapper
{
    public static function start(): void
    {
        $data = static::data();

        file_put_contents(Config::get('abs_path') . '/api.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    public static function data(): array
    {
        $telegramUrl='https://core.telegram.org/bots/api';

        $html = file_get_contents($telegramUrl);
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        $data = $xpath->query('//div[@id="dev_page_content"]')->item(0);

        $releaseTag = $xpath->query('//h4')->item(0)->textContent;
        $version = $xpath->query('//p/strong')->item(0)->textContent;

        $result = [
            'version' => $version,
            'release_date' => $releaseTag,
            'methods' => [],
            'types' => [],
        ];

        $currentType = $currentName = '';

        foreach ($data->childNodes as $node) {
            if ($node->nodeName === 'h3' || $node->nodeName === 'hr') {
                $currentType = '';
                $currentName = '';
            }

            if ($node->nodeName === 'h4') {
                $a = $node->getElementsByTagName('a')->item(0);
                $name = $a ? $a->getAttribute('name') : '';

                if ($name && strpos($name, '-') !== false) {
                    $currentName = '';
                    $currentType = '';
                    continue;
                }

                $currentType = ctype_upper($node->textContent[0]) ? 'types' : 'methods';
                $currentName = $node->textContent;

                if (!isset($result[$currentType][$currentName])) {
                    $result[$currentType][$currentName] = [];
                }

                if ($a && $href = $a->getAttribute('href')) {
                    $result[$currentType][$currentName]['href'] = $telegramUrl . $href;
                }

                continue;
            }

            if (!$currentType || !$currentName) {
                continue;
            }

            if ($node->nodeName === 'p') {
                $result[$currentType][$currentName]['description'][] = $node->textContent;
            }

            if ($node->nodeName === 'table') {
                $keys = [];
                $thead = $node->getElementsByTagName('thead')->item(0);
                if ($thead) {
                    foreach ($thead->getElementsByTagName('th') as $th) {
                        $keys[] = $th->textContent;
                    }
                }

                $values = [];
                $tbody = $node->getElementsByTagName('tbody')->item(0);
                if ($tbody) {
                    foreach ($tbody->getElementsByTagName('tr') as $tr) {
                        $row = [];
                        foreach ($tr->getElementsByTagName('td') as $td) {
                            $row[] = $td->textContent;
                        }
                        $values[] = $row;
                    }
                }

                $fields = array_values(array_map(
                    fn($n) => static::prepareFieldData($keys, $n),
                    array_filter($values)
                ));

                $keys = array_map(fn(array $field) => $field['parameter'] ?? $field['field'], $fields);
                $fields = array_map(function (array $field) {
                    unset($field['parameter'], $field['field']);
                    return $field;
                }, $fields);

                $result[$currentType][$currentName][$currentType === 'methods' ? 'parameters' : 'fields'] = array_combine($keys, $fields);
            }

            if ($node->nodeName === 'ul') {
                foreach ($node->getElementsByTagName('li') as $li) {
                    $a = $li->getElementsByTagName('a')->item(0);
                    if ($a) {
                        $type = $a->textContent;
                        $result[$currentType][$currentName]['subtypes'][] = $type;
                        $result[$currentType][$type]['extends'] = $currentName;
                    }
                }
            }

            if ($currentType === 'methods' && isset($result[$currentType][$currentName]['description'])) {
                $description = implode(PHP_EOL, $result[$currentType][$currentName]['description']);

                if (preg_match('/(?:on success,)([^.]*)/i', $description, $match)) {
                    static::extractReturnTypes($currentType, $currentName, trim($match[1]), $result);
                } elseif (preg_match('/(?:returns)([^.]*)(?:on success)?/i', $description, $match)) {
                    static::extractReturnTypes($currentType, $currentName, trim($match[1]), $result);
                } elseif (preg_match('/([^.]*)(?:is returned)/i', $description, $match)) {
                    static::extractReturnTypes($currentType, $currentName, trim($match[1]), $result);
                }
            }
        }

        return $result;
    }

    protected static function prepareFieldData(array $keys, array $data): array
    {
        $data = array_change_key_case(array_combine($keys, $data));

        if (isset($data['type'])) {
            $data['type'] = static::cleanType($data['type']);
        }

        if (isset($data['required'])) {
            $data['required'] = $data['required'] === 'Yes';
        }

        return $data;
    }

    protected static function extractReturnTypes($currentType, $currentName, $return, &$items): void
    {
        if (preg_match("/(?:array of )+(\w*)/i", $return, $match)) {
            $ret = static::cleanType($match[1]);
            $rets = array_map(fn($r) => "Array<$r>", $ret);
            $items[$currentType][$currentName]['returns'] = $rets;
        } else {
            $words = explode(' ', $return);
            $rets = [];
            foreach ($words as $ret) {
                $cleaned_ret = static::cleanType(preg_replace('/[^a-zA-Z0-9]/', '', $ret));
                foreach ($cleaned_ret as $r) {
                    if (ctype_upper($ret[0])) {
                        $rets[] = $r;
                    }
                }
            }
            $items[$currentType][$currentName]['returns'] = $rets;
        }
    }

    protected static function cleanType(string $type): array
    {
        if ($isArray = (strpos($type, 'Array of ') === 0)) {
            $type = substr($type, strlen('Array of '));
        }

        $fixed_ors = array_map('trim', explode(' or ', $type));
        $fixed_ands = [];
        foreach ($fixed_ors as $fo) {
            $fixed_ands = array_merge($fixed_ands, array_map('trim', explode(' and ', $fo)));
        }
        $fixed_commas = [];
        foreach ($fixed_ands as $fa) {
            $fixed_commas = array_merge($fixed_commas, array_map('trim', explode(', ', $fa)));
        }

        return array_map(fn(string $x) => $isArray ? 'Array<' . static::cleanType($x)[0] . '>' : $x, $fixed_commas);
    }
}