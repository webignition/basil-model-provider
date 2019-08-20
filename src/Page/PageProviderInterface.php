<?php

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModel\Page\PageInterface;
use webignition\BasilModelProvider\Exception\UnknownPageException;

interface PageProviderInterface
{
    /**
     * @param string $importName
     *
     * @return PageInterface
     *
     * @throws UnknownPageException
     */
    public function findPage(string $importName): PageInterface;
}
