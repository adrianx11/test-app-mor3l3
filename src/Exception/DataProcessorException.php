<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;
use Throwable;

class DataProcessorException extends Exception
{
    public static function createFromMessage(string $message, ?Throwable $previous = null): self
    {
        return new self(
            message: sprintf('DataProcessor has error: "%s".', $message),
            code: $previous instanceof Throwable ? $previous->getCode() : 0,
            previous: $previous,
        );
    }
}
