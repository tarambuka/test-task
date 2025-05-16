
# Code Tasks

This repository contains PHP implementations for different algorithmic tasks, adhering to PSR-12 standards and tested with PHPUnit.

## Tasks

### 1. Max Subarray
- **Interface:** `LeadDeskTasks\MaxSubarray`
- **Location:** `interfaces/MaxSubarray.php`
- **Implementation:** `max-subarray/src/MaxSubarrayImpl.php`
- **Description:** Finds the maximum sum of a contiguous subarray. Skips over non-numeric elements but accepts numeric strings.

### 2. Anagram
- **Interface:** `LeadDeskTasks\Anagram`
- **Location:** `interfaces/Anagram.php`
- **Implementation:** `anagram/src/AnagramImpl.php`
- **Description:** Checks if two words are anagrams of each other using character counts.

## Installation

To install project dependencies, run:

```bash
composer install
```

## Testing

Make sure PHPUnit is available through Composer and run tests with:

```bash
./vendor/bin/phpunit max-subarray/tests
```

```bash
./vendor/bin/phpunit anagram/tests
```

## PHP Version

Tested with **PHP 8.3.6**
