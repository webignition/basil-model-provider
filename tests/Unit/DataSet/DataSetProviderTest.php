<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilModelProvider\Tests\Unit\DataSet;

use webignition\BasilModel\DataSet\DataSet;
use webignition\BasilModel\DataSet\DataSetCollection;
use webignition\BasilModelProvider\DataSet\DataSetProvider;
use webignition\BasilModelProvider\DataSet\DataSetProviderInterface;
use webignition\BasilModelProvider\Exception\UnknownDataProviderException;

class DataSetProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(array $dataSetCollections, DataSetProviderInterface $expectedDataSetProvider)
    {
        $this->assertEquals($expectedDataSetProvider, new DataSetProvider($dataSetCollections));
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'dataSetCollections' => [],
                'expectedDataSetProvider' => new DataSetProvider([]),
            ],
            'invalid data set collections' => [
                'dataSetCollections' => [
                    1,
                    true,
                    [],
                ],
                'expectedDataSetProvider' => new DataSetProvider([]),
            ],
            'valid data set collections' => [
                'dataSetCollections' => [
                    'data_set_collection_1' => new DataSetCollection([
                        new DataSet('0', [
                            'foo' => 'bar',
                        ]),
                    ]),
                    'data_set_collection_2' => new DataSetCollection([
                        new DataSet('name', [
                            'fizz' => 'buzz',
                        ]),
                    ]),
                ],
                'expectedDataSetProvider' => new DataSetProvider([
                    'data_set_collection_1' => new DataSetCollection([
                        new DataSet('0', [
                            'foo' => 'bar',
                        ]),
                    ]),
                    'data_set_collection_2' => new DataSetCollection([
                        new DataSet('name', [
                            'fizz' => 'buzz',
                        ]),
                    ]),
                ]),
            ],
        ];
    }

    public function testFindDataSetCollection()
    {
        $importName = 'data_provider_import_name';
        $dataSetCollection = new DataSetCollection();

        $dataSetProvider = new DataSetProvider([
            $importName => $dataSetCollection,
        ]);

        $this->assertSame($dataSetCollection, $dataSetProvider->findDataSetCollection($importName));
    }

    public function testFindPageThrowsUnknownDataProviderException()
    {
        $this->expectException(UnknownDataProviderException::class);
        $this->expectExceptionMessage('Unknown data provider "data_provider_import_name"');

        $dataSetProvider = new DataSetProvider([]);
        $dataSetProvider->findDataSetCollection('data_provider_import_name');
    }
}
