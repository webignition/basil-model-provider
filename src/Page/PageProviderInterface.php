<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\Page\PageInterface;

interface PageProviderInterface extends ProviderInterface
{
    /**
     * @throws UnknownItemException
     */
    public function find(string $name): PageInterface;
}
