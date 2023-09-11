<?php

declare(strict_types=1);

namespace App\Service\Calculator;

use Psr\Log\LoggerInterface;

class Multiplication implements CalculatorInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function calculate(int $first, int $second): int
    {
        $this->logger->info(
            sprintf('Mnożenie %u razy %u', $first, $second)
        );

        return $first * $second;
    }
}
