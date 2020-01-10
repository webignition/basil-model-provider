<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\Page\PageInterface;

class PageProvider implements PageProviderInterface
{
    /**
     * @var PageInterface[]
     */
    private $pages = [];

    /**
     * @param array<mixed> $pages
     */
    public function __construct(array $pages)
    {
        foreach ($pages as $importName => $page) {
            if ($page instanceof PageInterface) {
                $this->pages[$importName] = $page;
            }
        }
    }

    /**
     * @param string $importName
     *
     * @return PageInterface
     *
     * @throws UnknownItemException
     */
    public function findPage(string $importName): PageInterface
    {
        $page = $this->pages[$importName] ?? null;

        if (null === $page) {
            throw new UnknownItemException(UnknownItemException::TYPE_PAGE, $importName);
        }

        return $page;
    }
}
