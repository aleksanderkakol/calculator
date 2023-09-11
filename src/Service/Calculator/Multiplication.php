<?php

declare(strict_types=1);

namespace App\Service\Calculator;

use Psr\Log\LoggerInterface;

class Multiplication implements CalculatorInterface
{
    protected const ALLOWED_OPERATION = '*';

    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function calculate(float $first, float $second): float
    {
        $this->logger->info(
            sprintf('Mnożenie %u razy %u', $first, $second)
        );

        return $first * $second;
    }

    public function canBeUsed(string $operation): bool
    {
        return $operation === self::ALLOWED_OPERATION;
    }
}
