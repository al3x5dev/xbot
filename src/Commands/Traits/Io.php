<?php

namespace Al3x5\xBot\Commands\Traits;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

trait Io
{
    protected SymfonyStyle $style;

    protected InputInterface $input;
    protected OutputInterface $output;

    /**
     * Instancia SymfonyStyle y optiene InputInterface, OutputInterface
     */
    protected function prepare(InputInterface $input, OutputInterface $output): void
    {
        $this->input = $input;
        $this->output = $output;
        $this->style = new SymfonyStyle($input, $output);
    }

    /**
     * Limpia la pantalla
     */
    protected function clear(): void
    {
        $this->output->write("\033[2J\033[;H");
    }

     /**
     * Muestra en pantalla los datos pasados en un array
     * 
     * Este metodo es muy util con los datos devueltos por hook:info y hook:about
     */
    protected function displayInfo(string $data) : int
    {
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            // Omitir líneas vacías
        if (trim($line) === '') {
            continue;
        }
            // Dividir cada línea en clave y valor
            if (strpos($line, ':') !== false) {
                list($key, $value) = explode(': ', $line, 2);
                $array[trim($key)] = trim($value);
            }
            $this->output->writeln("<info>$key</info>: ".trim($value));
            //print(Style::color(trim($key), 'green') . ": " . trim($value) . "\n");
        }
        return Command::SUCCESS;
    }
}
