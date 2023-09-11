<?php

declare(strict_types=1);

namespace App\Service\Calculator;

use Psr\Log\LoggerInterface;

class Calculator implements CalculatorInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function addition(int $first, int $second): int
    {
        $this->logger->info(
            sprintf('Dodawanie %u i %u', $first, $second)
        );

        return $first + $second;
    }

    public function subtraction(int $first, int $second): int
    {
        $this->logger->info(
            sprintf('Odejmowanie %u i %u', $first, $second)
        );

        return $first - $second;
    }

    public function multiplication(int $first, int $second): int
    {
        $this->logger->info(
            sprintf('Mnożenie %u razy %u', $first, $second)
        );

        return $first * $second;
    }

    public function division(int $first, int $second): int
    {
        $this->logger->info(
            sprintf('Dzielenie %u przez %u', $first, $second)
        );

        return $first / $second;
    }
}
