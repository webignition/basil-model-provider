<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownPageException;
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
     * @throws UnknownPageException
     */
    public function findPage(string $importName): PageInterface
    {
        $page = $this->pages[$importName] ?? null;

        if (null === $page) {
            throw new UnknownPageException($importName);
        }

        return $page;
    }
}
