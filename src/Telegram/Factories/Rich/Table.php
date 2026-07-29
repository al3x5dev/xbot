<?php

namespace Al3x5\xBot\Telegram\Factories\Rich;

use Al3x5\xBot\Telegram\Entities\InputRichBlock;
use Al3x5\xBot\Telegram\Entities\InputRichBlockTable;
use Al3x5\xBot\Telegram\Entities\RichBlockTableCell;
use Al3x5\xBot\Telegram\Entities\RichText;

class Table
{
    private array $header = [];
    private array $rows = [];
    private array $footer = [];
    private array $options = [];

    public function header(array $cells): self
    {
        $this->header = $cells;
        return $this;
    }

    public function body(array $rows): self
    {
        $this->rows = $rows;
        return $this;
    }

    public function footer(array $cells): self
    {
        $this->footer = $cells;
        return $this;
    }

    public function bordered(bool $v = true): self
    {
        $this->options['is_bordered'] = $v;
        return $this;
    }

    public function striped(bool $v = true): self
    {
        $this->options['is_striped'] = $v;
        return $this;
    }

    public function caption(string|RichText|array $caption): self
    {
        $this->options['caption'] = $caption;
        return $this;
    }

    public function build(): InputRichBlockTable
    {
        $cells = [];

        if ($this->header) {
            $cells[] = array_map(fn($c) => $this->resolveCell($c, true), $this->header);
        }

        foreach ($this->rows as $row) {
            $cells[] = array_map(fn($c) => $this->resolveCell($c, false), $row);
        }

        if ($this->footer) {
            $cells[] = array_map(fn($c) => $this->resolveCell($c, false), $this->footer);
        }

        $table = new InputRichBlockTable([]);
        $table->type = InputRichBlock::TYPE_TABLE;
        $table->cells = $cells;

        if (isset($this->options['is_bordered'])) {
            $table->is_bordered = $this->options['is_bordered'];
        }
        if (isset($this->options['is_striped'])) {
            $table->is_striped = $this->options['is_striped'];
        }
        if (isset($this->options['caption'])) {
            $table->caption = $this->options['caption'];
        }

        return $table;
    }

    private function resolveCell(mixed $cell, bool $isHeader): RichBlockTableCell
    {
        if ($cell instanceof RichBlockTableCell) {
            return $cell;
        }

        if (is_array($cell)) {
            if (!isset($cell['text'])) {
                $cell['text'] = '';
            }
            if (!isset($cell['is_header'])) {
                $cell['is_header'] = $isHeader;
            }
            return new RichBlockTableCell($cell);
        }

        if ($cell instanceof RichText) {
            return new RichBlockTableCell([
                'text' => $cell,
                'is_header' => $isHeader,
            ]);
        }

        return new RichBlockTableCell([
            'text' => (string) $cell,
            'is_header' => $isHeader,
        ]);
    }
}
