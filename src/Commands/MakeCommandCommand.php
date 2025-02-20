<?php

namespace Al3x5\xBot\Commands;

use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\MakeClass;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * MakeCommand command class
 */
final class MakeCommandCommand extends Command
{
    use Io, MakeClass;
    public function configure(): void
    {
        $this
            ->setName('make:command')
            ->setDescription('Create a new console command')
            ->addArgument('name', InputArgument::OPTIONAL, 'The name of the command');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->prepare($input, $output);

        $name =  !is_null($input->getArgument('name'))
            ? $input->getArgument('url')
            : $this->style->ask(
                'What should the console command be named? [Eg. GetUpdate]',
                null,
                function ($name): ?string {
                    return (empty($name)) ? '' : $name;
                }
            );

        if ($name == '') {
            $output->writeln("<error>Error: The name cannot be empty.</error>");
            return Command::FAILURE;
        }

        // Usar una expresión regular para separar las palabras
        $words = preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY);

        // Unir la primera palabra con ":" y el resto con "-"
        $command = $words[0]; // Primera palabra
        for ($i = 1; $i < count($words); $i++) {
            // Usar ":" solo después de la primera palabra
            $command .= ($i == 1) ? ":" : "-";
            $command .= $words[$i];
        }

        $this->makeCliCommand($name, strtolower($command));
        $output->writeln("<info>Console command created successfully.</info>");
        return Command::SUCCESS;
    }
}
