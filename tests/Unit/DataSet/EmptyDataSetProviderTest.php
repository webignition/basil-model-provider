<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\DataSet;

use webignition\BasilModelProvider\DataSet\EmptyDataSetProvider;
use webignition\BasilModelProvider\Exception\UnknownDataProviderException;

class EmptyDataSetProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindDataSetCollectionThrowsUnknownDataProviderException()
    {
        $this->expectException(UnknownDataProviderException::class);
        $this->expectExceptionMessage('Unknown data provider "data_provider_import_name"');

        $dataSetProvider = new EmptyDataSetProvider();
        $dataSetProvider->findDataSetCollection('data_provider_import_name');
    }
}
