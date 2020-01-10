<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\DataSet\DataSetCollectionInterface;

interface DataSetProviderInterface
{
    /**
     * @param string $importName
     *
     * @return DataSetCollectionInterface
     *
     * @throws UnknownItemException
     */
    public function findDataSetCollection(string $importName): DataSetCollectionInterface;
}
