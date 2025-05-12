<?php

declare(strict_types=1);

namespace App\DataProcessor;

class WordFilterByLengthAndPrefixDataProcessor implements DataProcessorInterface
{
    private const string FIRST_LATTER = 'W';

    /**
     * @param string[] $data
     */
    public function process(array &$data): void
    {
        foreach ($data as $key => $value) {
            if (1 === mb_strlen($value) % 2 || !str_starts_with($value, self::FIRST_LATTER)) {
                unset($data[$key]);
            }
        }
    }

    public static function getPriority(): int
    {
        return 100;
    }
}
