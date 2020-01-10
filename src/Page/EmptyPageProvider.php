<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\Page\PageInterface;

class EmptyPageProvider implements ProviderInterface
{
    /**
     * @param string $name
     *
     * @return PageInterface
     *
     * @throws UnknownItemException
     */
    public function find(string $name): PageInterface
    {
        throw new UnknownItemException(UnknownItemException::TYPE_PAGE, $name);
    }
}
