<?php

declare(strict_types=1);

namespace App\Service\Calculator;

use Psr\Log\LoggerInterface;

class Addition implements CalculatorInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function calculate(int $first, int $second): int
    {
        $this->logger->info(
            sprintf('Dodawanie %u i %u', $first, $second)
        );

        return $first + $second;
    }
}
