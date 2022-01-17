<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Identifier;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;

interface IdentifierProviderInterface extends ProviderInterface
{
    /**
     * @throws UnknownItemException
     */
    public function find(string $name): string;
}
