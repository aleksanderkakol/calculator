<?php

declare(strict_types=1);

namespace App\Service\Calculator;

use Psr\Log\LoggerInterface;

class Division implements CalculatorInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function calculate(float $first, float $second): float
    {
        $this->logger->info(
            sprintf('Dzielenie %u przez %u', $first, $second)
        );

        return $first / $second;
    }
}
