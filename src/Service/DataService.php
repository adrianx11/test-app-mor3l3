<?php

declare(strict_types=1);

namespace App\Service;

use App\DataProcessor\DataProcessorInterface;
use App\Exception\DataProcessorException;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

readonly class DataService
{
    /**
     * @param iterable<DataProcessorInterface[]> $processors
     */
    public function __construct(
        #[AutowireIterator(tag: DataProcessorInterface::class, defaultIndexMethod: 'getPriority')]
        private iterable $processors,
    ) {
    }

    /**
     * @param string[] $data
     *
     * @return string[]
     *
     * @throws DataProcessorException
     */
    public function processArray(array $data): array
    {
        if ([] === $data) {
            throw DataProcessorException::createFromMessage('Empty input collection.');
        }

        /** @var DataProcessorInterface $processor */
        foreach ($this->processors as $processor) {
            $processor->process($data);
        }

        return $data;
    }
}
