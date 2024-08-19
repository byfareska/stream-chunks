<?php declare(strict_types=1);

namespace Byfareska\StreamChunks\Tests;

use Byfareska\StreamChunks\PsrStreamChunks;
use Nyholm\Psr7\Stream;
use PHPUnit\Framework\TestCase;

class PsrStreamChunksTest extends TestCase
{

    public function testGetIterator(): void
    {
        [$randomString, $stream] = ResourceStreamChunksTest::createRandomStringWithStream();
        $chunks = new PsrStreamChunks(new Stream($stream));

        $this->assertSame(
            $randomString,
            implode('', iterator_to_array($chunks))
        );
    }
}
