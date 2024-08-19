<?php declare(strict_types=1);

namespace Byfareska\StreamChunks;

use Psr\Http\Message\StreamInterface;
use Traversable;

final readonly class PsrStreamChunks implements StreamChunks
{
    private const string EMPTY_STRING = '';

    public function __construct(
        private StreamInterface $stream,
        private int $chunkSize = 8192,
    )
    {
    }

    public function getIterator(): Traversable
    {
        while (self::EMPTY_STRING !== ($chunk = $this->stream->read($this->chunkSize))) {
            yield $chunk;
        }

        $this->reset();
    }

    public function getStream(): StreamInterface
    {
        return $this->stream;
    }

    public function reset(): void
    {
        $this->stream->rewind();
    }
}