<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\DataSet\DataSetCollectionInterface;

class DataSetProvider implements ProviderInterface
{
    /**
     * @var DataSetCollectionInterface[]
     */
    private $items = [];

    /**
     * @param array<mixed> $dataSetCollections
     */
    public function __construct(array $dataSetCollections)
    {
        foreach ($dataSetCollections as $name => $dataSetCollection) {
            if ($dataSetCollection instanceof DataSetCollectionInterface) {
                $this->items[$name] = $dataSetCollection;
            }
        }
    }

    /**
     * @param string $name
     *
     * @return DataSetCollectionInterface
     *
     * @throws UnknownItemException
     */
    public function find(string $name): DataSetCollectionInterface
    {
        $dataSetCollection = $this->items[$name] ?? null;

        if (null === $dataSetCollection) {
            throw new UnknownItemException(UnknownItemException::TYPE_DATASET, $name);
        }

        return $dataSetCollection;
    }
}
