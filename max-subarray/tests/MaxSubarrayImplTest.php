<?php

declare(strict_types=1);

namespace MaxSubarray\Tests;

use MaxSubarray\MaxSubarrayImpl;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class MaxSubarrayImplTest extends TestCase
{
    private MaxSubarrayImpl $maxSubarray;

    protected function setUp(): void
    {
        $this->maxSubarray = new MaxSubarrayImpl();
    }

    public function testSimplePositiveNumbers(): void
    {
        $input = [1, 2, 3, 4];
        $this->assertSame(10, $this->maxSubarray->contiguous($input));
    }

    public function testMixedPositiveAndNegative(): void
    {
        $input = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
        $this->assertSame(6, $this->maxSubarray->contiguous($input));
    }

    public function testNonNumericValuesBreakSubarray(): void
    {
        $input = [1, 2, 'a', 3, 4];
        // The max subarray is either [1,2] or [3,4], both sum to 3 or 7, max is 7
        $this->assertSame(7, $this->maxSubarray->contiguous($input));
    }

    public function testNumericStringsTreatedAsNumbers(): void
    {
        $input = [1, '2', 3, '4'];
        $this->assertSame(10, $this->maxSubarray->contiguous($input));
    }

    public function testAllNegativeNumbers(): void
    {
        $input = [-5, -2, -3, -4];
        $this->assertSame(-2, $this->maxSubarray->contiguous($input));
    }

    public function testSingleElement(): void
    {
        $input = [42];
        $this->assertSame(42, $this->maxSubarray->contiguous($input));
    }

    public function testAllNonNumericThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $input = ['a', 'b', null, false];
        $this->maxSubarray->contiguous($input);
    }

    public function testOnlyOneValidNumber(): void
    {
        $input = ['a', 'b', 6, null, false];
        $this->assertSame(6, $this->maxSubarray->contiguous($input));
    }

    public function testEmptyArrayThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $input = [];
        $this->maxSubarray->contiguous($input);
    }
}
