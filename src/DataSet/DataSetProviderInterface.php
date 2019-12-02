<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModel\DataSet\DataSetCollectionInterface;
use webignition\BasilModelProvider\Exception\UnknownDataProviderException;

interface DataSetProviderInterface
{
    /**
     * @param string $importName
     *
     * @return DataSetCollectionInterface
     *
     * @throws UnknownDataProviderException
     */
    public function findDataSetCollection(string $importName): DataSetCollectionInterface;
}
