<?php declare(strict_types=1);

namespace Byfareska\StreamChunks;

use IteratorAggregate;
use Symfony\Contracts\Service\ResetInterface;

interface StreamChunks extends IteratorAggregate, ResetInterface
{
}