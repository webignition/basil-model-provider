<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Exception;

use webignition\BasilModelProvider\Exception\UnknownIdentifierException;

class UnknownIdentifierExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testGetMessage()
    {
        $name = 'name';

        $exception = new UnknownIdentifierException($name);

        $this->assertSame('Unknown identifier with name "name"', $exception->getMessage());
    }

    public function testGetIdentifier()
    {
        $name = 'name';

        $exception = new UnknownIdentifierException($name);

        $this->assertSame($name, $exception->getName());
    }
}
