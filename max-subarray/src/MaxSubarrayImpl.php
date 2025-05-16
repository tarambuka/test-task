<?php

declare(strict_types=1);

namespace MaxSubarray;

use InvalidArgumentException;
use LeadDeskTasks\MaxSubarray;

/**
 * Class MaxSubarrayImpl
 *
 * This class implements the MaxSubarray interface to find the maximum contiguous subarray sum.
 *
 * PHP version 8.3.6
 *
 * @package MaxSubarray
 */
class MaxSubarrayImpl implements MaxSubarray
{

    /**
     * Finds the maximum contiguous subarray sum.
     *
     * @param array $array Input array (can contain non-numeric values)
     * @return int Maximum sum of contiguous subarray
     * @throws InvalidArgumentException If no valid numeric subarray is found
     */
    public function contiguous(array $array): int
    {
        $maxSoFar = null;
        $maxEndingHere = null;

        $length = count($array);
        for ($i = 0; $i < $length; $i++) {
            $value = $array[$i];

            if (!is_numeric($value)) {
                // Reset on non-numeric (subarray ends here)
                $maxEndingHere = null;
                continue; // Skip rest of the loop and move to next iteration
            }

            $num = (int)$value;

            if ($maxEndingHere === null) {
                // Start new subarray
                $maxEndingHere = $num;
                $maxSoFar = $num;
            } else {
                // Continue the current subarray or start a new one
                $maxEndingHere = max($num, $maxEndingHere + $num);
                $maxSoFar = max($maxSoFar, $maxEndingHere);
            }
        }

        if ($maxSoFar === null) {
            throw new InvalidArgumentException('No valid numeric subarray found.');
        }

        return $maxSoFar;
    }
}
