<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Exception;

use webignition\BasilModelProvider\Exception\UnknownItemException;

class UnknownItemExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $exception = new UnknownItemException(UnknownItemException::TYPE_DATASET, 'item_name');

        $this->assertSame(UnknownItemException::TYPE_DATASET, $exception->getType());
        $this->assertSame('item_name', $exception->getName());
    }
}
