<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Identifier;

use webignition\BasilModelProvider\Exception\UnknownIdentifierException;
use webignition\BasilModelProvider\Identifier\EmptyIdentifierProvider;

class EmptyIdentifierProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindStepThrowsUnknownIdentifierException()
    {
        $this->expectException(UnknownIdentifierException::class);
        $this->expectExceptionMessage('Unknown identifier with name "name"');

        $provider = new EmptyIdentifierProvider();
        $provider->findIdentifier('name');
    }
}
