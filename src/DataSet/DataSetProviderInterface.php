<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\DataSet;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\DataSet\DataSetCollectionInterface;

interface DataSetProviderInterface extends ProviderInterface
{
    /**
     * @throws UnknownItemException
     */
    public function find(string $name): DataSetCollectionInterface;
}
