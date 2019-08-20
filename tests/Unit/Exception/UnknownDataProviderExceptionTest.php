<?php

namespace webignition\BasilModelProvider\Tests\Unit\Exception;

use webignition\BasilModelProvider\Exception\UnknownDataProviderException;

class UnknownDataProviderExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testGetMessage()
    {
        $importName = 'data_provider_import_name';

        $exception = new UnknownDataProviderException($importName);

        $this->assertSame('Unknown data provider "data_provider_import_name"', $exception->getMessage());
    }

    public function testGetImportName()
    {
        $importName = 'data_provider_import_name';

        $exception = new UnknownDataProviderException($importName);

        $this->assertSame($importName, $exception->getImportName());
    }
}
