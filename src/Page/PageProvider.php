<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\Page\PageInterface;

class PageProvider implements ProviderInterface
{
    /**
     * @var PageInterface[]
     */
    private $items = [];

    /**
     * @param array<mixed> $pages
     */
    public function __construct(array $pages)
    {
        foreach ($pages as $importName => $page) {
            if ($page instanceof PageInterface) {
                $this->items[$importName] = $page;
            }
        }
    }

    /**
     * @param string $name
     *
     * @return PageInterface
     *
     * @throws UnknownItemException
     */
    public function find(string $name): PageInterface
    {
        $page = $this->items[$name] ?? null;

        if (null === $page) {
            throw new UnknownItemException(UnknownItemException::TYPE_PAGE, $name);
        }

        return $page;
    }
}
