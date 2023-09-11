<?php

declare(strict_types=1);

namespace App\Service\Calculator;

use Psr\Log\LoggerInterface;

class Subtraction implements CalculatorInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function calculate(float $first, float $second): float
    {
        $this->logger->info(
            sprintf('Odejmowanie %u i %u', $first, $second)
        );

        return $first - $second;
    }
}
