<?php

namespace App\Service\Calculator;

interface CalculatorInterface
{
    public function canBeUsed(string $operation): bool;

    public function calculate(float $first, float $second): float;
}
