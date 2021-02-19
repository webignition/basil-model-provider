<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Identifier;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\Identifier\EmptyIdentifierProvider;

class EmptyIdentifierProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindThrowsUnknownItemException(): void
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown identifier "name"');

        $provider = new EmptyIdentifierProvider();
        $provider->find('name');
    }
}
