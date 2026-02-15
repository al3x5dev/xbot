<?php

namespace Al3x5\xBot\Commands\Traits;

use Symfony\Component\Console\Command\Command;

trait AskForClass
{
    protected function askForClassName(
        ?string $value = null,
        string $question,
        bool $required = true
    ): string {
        if ($value !== null && trim($value) !== '') {
            return trim($value);
        }

        $name = $this->style->ask($question, null, function ($input) use ($required) {
            $input = trim((string) $input);

            if ($required && $input === '') {
                throw new \InvalidArgumentException('Name cannot be empty.');
            }

            return $input;
        });

        if ($required && $name === '') {
            $this->output->writeln('<error>Name cannot be empty.</error>');
            exit(Command::FAILURE);
        }

        return $name;
    }
}
