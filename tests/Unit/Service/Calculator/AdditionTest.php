<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Calculator;

use App\Service\Calculator\Addition;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class AdditionTest extends TestCase
{
    public function additionDataProvider(): array
    {
        return [
            'Positive numbers' => [
                'first' => 1,
                'second' => 3,
                'expectedResult' => 4.0,
                'exception' => null,
            ],
            'Negative numbers' => [
                'first' => -2,
                'second' => -3,
                'expectedResult' => -5.0,
                'exception' => null,
            ],
            'Positive and negative numbers' => [
                'first' => -2,
                'second' => 3,
                'expectedResult' => 1.0,
                'exception' => null,
            ],
            'Zeros' => [
                'first' => 0,
                'second' => 0,
                'expectedResult' => 0.0,
                'exception' => null,
            ],
            'String argument' => [
                'first' => '1',
                'second' => 1,
                'expectedResult' => null,
                'exception' => \TypeError::class,
            ],
            'Null argument' => [
                'first' => null,
                'second' => 1,
                'expectedResult' => null,
                'exception' => \TypeError::class,
            ],
        ];
    }

    /** @dataProvider additionDataProvider */
    public function testAddition($first, $second, ?float $expectedResult, ?string $exception): void
    {
        $service = new Addition(new NullLogger());

        if ($exception) {
            $this->expectException($exception);
        }

        $result = $service->calculate($first, $second);

        $this->assertSame($expectedResult, $result);
    }
}
