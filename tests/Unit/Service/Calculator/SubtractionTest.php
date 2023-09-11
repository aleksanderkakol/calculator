<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Calculator;

use App\Service\Calculator\Subtraction;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class SubtractionTest extends TestCase
{
    public function subtractionDataProvider(): array
    {
        return [
            'Positive numbers' => [
                'first' => 3,
                'second' => 1,
                'expectedResult' => 2,
                'exception' => null,
            ],
            'Negative numbers' => [
                'first' => -2,
                'second' => -3,
                'expectedResult' => 1,
                'exception' => null,
            ],
            'Positive and negative numbers' => [
                'first' => -2,
                'second' => 3,
                'expectedResult' => -5,
                'exception' => null,
            ],
            'Zeros' => [
                'first' => 0,
                'second' => 0,
                'expectedResult' => 0,
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

    /** @dataProvider subtractionDataProvider */
    public function testSubtraction($first, $second, ?int $expectedResult, ?string $exception): void
    {
        $service = new Subtraction(new NullLogger());

        if ($exception) {
            $this->expectException($exception);
        }

        $result = $service->calculate($first, $second);

        $this->assertSame($expectedResult, $result);
    }
}
