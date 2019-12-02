<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModelProvider\Exception\UnknownDataProviderException;
use webignition\BasilModels\DataSet\DataSetCollectionInterface;

class EmptyDataSetProvider implements DataSetProviderInterface
{
    /**
     * @param string $importName
     *
     * @return DataSetCollectionInterface
     *
     * @throws UnknownDataProviderException
     */
    public function findDataSetCollection(string $importName): DataSetCollectionInterface
    {
        throw new UnknownDataProviderException($importName);
    }
}
