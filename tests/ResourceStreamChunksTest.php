<?php

namespace Byfareska\StreamChunks\Tests;

use Byfareska\StreamChunks\ResourceStreamChunks;
use PHPUnit\Framework\TestCase;

class ResourceStreamChunksTest extends TestCase
{

    public function testGetIterator(): void
    {
        [$randomString, $resource] = self::createRandomStringWithStream();
        $chunks = new ResourceStreamChunks($resource);

        $this->assertSame(
            $randomString,
            implode('', iterator_to_array($chunks))
        );
    }

    public static function createRandomStringWithStream(): array
    {
        $randomString = bin2hex(random_bytes(1024 * 1024));
        $stream = fopen('php://memory', 'r+b');
        fwrite($stream, $randomString);
        rewind($stream);

        return [$randomString, $stream];
    }
}
