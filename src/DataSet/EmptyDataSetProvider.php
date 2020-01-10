<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\DataSet\DataSetCollectionInterface;

class EmptyDataSetProvider implements ProviderInterface
{
    /**
     * @param string $name
     *
     * @return DataSetCollectionInterface
     *
     * @throws UnknownItemException
     */
    public function find(string $name): DataSetCollectionInterface
    {
        throw new UnknownItemException(UnknownItemException::TYPE_DATASET, $name);
    }
}
