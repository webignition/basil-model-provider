<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Identifier;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;

class EmptyIdentifierProvider implements ProviderInterface
{
    /**
     * @throws UnknownItemException
     */
    public function find(string $name): string
    {
        throw new UnknownItemException(UnknownItemException::TYPE_IDENTIFIER, $name);
    }
}
