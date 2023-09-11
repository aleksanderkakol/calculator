<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Calculator;

use App\Service\Calculator\Division;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class DivisionTest extends TestCase
{
    public function divisionDataProvider(): array
    {
        return [
            'Positive numbers' => [
                'first' => 3,
                'second' => 1,
                'expectedResult' => 3,
                'exception' => null,
            ],
            'Negative numbers' => [
                'first' => -2,
                'second' => -3,
                'expectedResult' => 0.6666,
                'exception' => null,
            ],
            'Positive and negative numbers' => [
                'first' => -2,
                'second' => 3,
                'expectedResult' => -0.6666,
                'exception' => null,
            ],
            'Zeros' => [
                'first' => 0,
                'second' => 0,
                'expectedResult' => null,
                'exception' => \DivisionByZeroError::class,
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

    /** @dataProvider divisionDataProvider */
    public function testDivision($first, $second, ?float $expectedResult, ?string $exception): void
    {
        $service = new Division(new NullLogger());

        if ($exception) {
            $this->expectException($exception);
        }

        $result = $service->calculate($first, $second);

        $this->assertEqualsWithDelta($expectedResult, $result, 0.0001);
    }
}
