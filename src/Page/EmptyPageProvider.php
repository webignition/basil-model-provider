<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownPageException;
use webignition\BasilModels\Page\PageInterface;

class EmptyPageProvider implements PageProviderInterface
{
    /**
     * @param string $importName
     *
     * @return PageInterface
     *
     * @throws UnknownPageException
     */
    public function findPage(string $importName): PageInterface
    {
        throw new UnknownPageException($importName);
    }
}
