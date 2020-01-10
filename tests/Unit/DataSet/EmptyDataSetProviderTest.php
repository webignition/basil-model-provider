<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\DataSet;

use webignition\BasilModelProvider\DataSet\EmptyDataSetProvider;
use webignition\BasilModelProvider\Exception\UnknownItemException;

class EmptyDataSetProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindDataSetCollectionThrowsUnknownItemException()
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown dataset "data_provider_import_name"');

        $provider = new EmptyDataSetProvider();
        $provider->findDataSetCollection('data_provider_import_name');
    }
}
