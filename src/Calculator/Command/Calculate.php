<?php

declare(strict_types=1);

namespace App\Calculator\Command;

use App\Service\Calculator\CalculatorInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('calculate')]
class Calculate extends Command
{
    protected iterable $operations;

    public function __construct(iterable $operations, string $name = null)
    {
        $this->operations = $operations;
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->setHelp('Calculate two numbers')
            ->addArgument('firstNumber', InputArgument::REQUIRED)
            ->addArgument('option', InputArgument::REQUIRED, '+, -, /, *')
            ->addArgument('secondNumber', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $first = (int) $input->getArgument('firstNumber');
        $second = (int) $input->getArgument('secondNumber');
        $option = $input->getArgument('option');

        /** @var CalculatorInterface $operation */
        foreach ($this->operations as $operation) {
            if ($operation->canBeUsed($option)) {
                $result = $operation->calculate($first, $second);
                $output->writeln(sprintf('Wynik: %s', $result));

                return Command::SUCCESS;
            }
        }

        return Command::FAILURE;
    }
}
