<?php

namespace App\Service\Calculator;

interface CalculatorInterface
{
    public function calculate(int $first, int $second): int;
}
