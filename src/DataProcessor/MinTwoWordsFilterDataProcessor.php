<?php

declare(strict_types=1);

namespace App\DataProcessor;

class MinTwoWordsFilterDataProcessor implements DataProcessorInterface
{
    public function process(array &$data): void
    {
        foreach ($data as $key => $value) {
            if (str_word_count($value) < 2) {
                unset($data[$key]);
            }
        }
    }

    public static function getPriority(): int
    {
        return 100;
    }
}
