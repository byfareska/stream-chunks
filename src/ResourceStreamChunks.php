<?php declare(strict_types=1);

namespace Byfareska\StreamChunks;

use Traversable;
use TypeError;

final class ResourceStreamChunks implements StreamChunks
{
    public function __construct(
        private /*resource*/ $resource,
        private readonly int $chunkSize = 8192,
    )
    {
        if (!is_resource($this->resource)) {
            throw new TypeError('Resource is not a valid resource');
        }
    }

    public function getIterator(): Traversable
    {
        while (($buffer = fgets($this->resource, $this->chunkSize)) !== false) {
            yield $buffer;
        }

        $this->reset();
    }

    public function reset(): void
    {
        rewind($this->resource);
    }
}