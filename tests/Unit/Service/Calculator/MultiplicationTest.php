<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Calculator;

use App\Service\Calculator\Multiplication;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class MultiplicationTest extends TestCase
{
    public function multiplicationDataProvider(): array
    {
        return [
            'Positive numbers' => [
                'first' => 3,
                'second' => 1,
                'expectedResult' => 3.0,
                'exception' => null,
            ],
            'Negative numbers' => [
                'first' => -2,
                'second' => -3,
                'expectedResult' => 6.0,
                'exception' => null,
            ],
            'Positive and negative numbers' => [
                'first' => -2,
                'second' => 3,
                'expectedResult' => -6.0,
                'exception' => null,
            ],
            'Zeros' => [
                'first' => 0,
                'second' => 0,
                'expectedResult' => 0.0,
                'exception' => null,
            ],
            'String argument' => [
                'first' => '10',
                'second' => 5,
                'expectedResult' => null,
                'exception' => \TypeError::class,
            ],
            'Null argument' => [
                'first' => 10,
                'second' => null,
                'expectedResult' => null,
                'exception' => \TypeError::class,
            ],
        ];
    }

    /** @dataProvider multiplicationDataProvider */
    public function testMultiplication($first, $second, ?float $expectedResult, ?string $exception): void
    {
        $service = new Multiplication(new NullLogger());

        if ($exception) {
            $this->expectException($exception);
        }

        $result = $service->calculate($first, $second);

        $this->assertSame($expectedResult, $result);
    }
}
