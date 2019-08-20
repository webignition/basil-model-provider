<?php

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModel\DataSet\DataSetCollectionInterface;
use webignition\BasilModelProvider\Exception\UnknownDataProviderException;

class DataSetProvider implements DataSetProviderInterface
{
    /**
     * @var DataSetCollectionInterface[]
     */
    private $dataSetCollections = [];

    /**
     * @param DataSetCollectionInterface[] $dataSetCollections
     */
    public function __construct(array $dataSetCollections)
    {
        foreach ($dataSetCollections as $importName => $dataSetCollection) {
            if ($dataSetCollection instanceof DataSetCollectionInterface) {
                $this->dataSetCollections[$importName] = $dataSetCollection;
            }
        }
    }

    /**
     * @param string $importName
     *
     * @return DataSetCollectionInterface
     *
     * @throws UnknownDataProviderException
     */
    public function findDataSetCollection(string $importName): DataSetCollectionInterface
    {
        $dataSetCollection = $this->dataSetCollections[$importName] ?? null;

        if (null === $dataSetCollection) {
            throw new UnknownDataProviderException($importName);
        }

        return $dataSetCollection;
    }
}
