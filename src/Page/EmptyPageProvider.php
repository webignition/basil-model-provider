<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\Page\PageInterface;

class EmptyPageProvider implements PageProviderInterface
{
    /**
     * @param string $importName
     *
     * @return PageInterface
     *
     * @throws UnknownItemException
     */
    public function findPage(string $importName): PageInterface
    {
        throw new UnknownItemException(UnknownItemException::TYPE_PAGE, $importName);
    }
}
