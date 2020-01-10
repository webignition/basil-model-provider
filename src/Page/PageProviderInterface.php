<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\Page\PageInterface;

interface PageProviderInterface
{
    /**
     * @param string $importName
     *
     * @return PageInterface
     *
     * @throws UnknownItemException
     */
    public function findPage(string $importName): PageInterface;
}
