<?php

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModel\Page\PageInterface;
use webignition\BasilModelProvider\Exception\UnknownPageException;

class PageProvider implements PageProviderInterface
{
    private $pages = [];

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
