<?php

declare(strict_types=1);

namespace App\DataProcessor;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag]
interface DataProcessorInterface
{
    /**
     * @param string[] $data
     */
    public function process(array &$data): void;

    public static function getPriority(): int;
}
