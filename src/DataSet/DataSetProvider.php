<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\DataSet\DataSetCollectionInterface;

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
     * @throws UnknownItemException
     */
    public function findDataSetCollection(string $importName): DataSetCollectionInterface
    {
        $dataSetCollection = $this->dataSetCollections[$importName] ?? null;

        if (null === $dataSetCollection) {
            throw new UnknownItemException(UnknownItemException::TYPE_DATASET, $importName);
        }

        return $dataSetCollection;
    }
}
