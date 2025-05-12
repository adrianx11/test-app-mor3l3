<?php

declare(strict_types=1);

namespace App\DataProcessor;

class RandomSelectionLimiterDataProcessor implements DataProcessorInterface
{
    private const int LIMIT = 3;

    public function process(array &$data): void
    {
        shuffle($data);
        $data = array_slice($data, 0, self::LIMIT);
    }

    public static function getPriority(): int
    {
        return 99;
    }
}
