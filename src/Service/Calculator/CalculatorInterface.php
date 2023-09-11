<?php

namespace App\Service\Calculator;

interface CalculatorInterface
{
    public function addition(int $first, int $second): int;

    public function subtraction(int $first, int $second): int;

    public function multiplication(int $first, int $second): int;

    public function division(int $first, int $second): int;
}
