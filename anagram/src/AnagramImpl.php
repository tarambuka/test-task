<?php

declare(strict_types=1);

namespace Anagram;

use InvalidArgumentException;
use LeadDeskTasks\Anagram;


/**
 * Class AnagramImpl
 *
 * This class implements the Anagram interface to determine if two words are anagrams of each other.
 *
 * PHP version 8.3.6
 *
 * @package Anagram
 */
class AnagramImpl implements Anagram
{
    /**
     * Determines if two words are anagrams of each other.
     *
     * @param string $word1 First word (A-Z uppercase)
     * @param string $word2 Second word (A-Z uppercase)
     * @return bool True if anagrams, false otherwise
     */
    public function isAnagram(string $word1, string $word2): bool
    {
        // Quick length check - if different lengths, can't be anagrams
        if (strlen($word1) !== strlen($word2)) {
            return false;
        }

        // Count characters frequency for first word
        $count1 = count_chars($word1, 1);
        // Count characters frequency for second word
        $count2 = count_chars($word2, 1);

        // Compare the frequency arrays — if same, words are anagrams
        return $count1 === $count2;
    }
}
