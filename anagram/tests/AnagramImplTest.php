<?php

declare(strict_types=1);

namespace tests;

use Anagram\AnagramImpl;
use PHPUnit\Framework\TestCase;

class AnagramImplTest extends TestCase
{
    private AnagramImpl $anagram;

    protected function setUp(): void
    {
        $this->anagram = new AnagramImpl();
    }

    public function testIdenticalWordsAreAnagrams(): void
    {
        $this->assertTrue($this->anagram->isAnagram('TEST', 'TEST'));
    }

    public function testSimpleAnagram(): void
    {
        $this->assertTrue($this->anagram->isAnagram('RAT', 'TAR'));
    }

    public function testNotAnAnagram(): void
    {
        $this->assertFalse($this->anagram->isAnagram('RAT', 'CAR'));
    }

    public function testWordsWithDifferentLengths(): void
    {
        $this->assertFalse($this->anagram->isAnagram('RAT', 'RATS'));
    }

    public function testAnagramWithRepeatedLetters(): void
    {
        $this->assertTrue($this->anagram->isAnagram('AAB', 'ABA'));
    }

    public function testSingleLetterWords(): void
    {
        $this->assertTrue($this->anagram->isAnagram('A', 'A'));
        $this->assertFalse($this->anagram->isAnagram('A', 'B'));
    }

}
