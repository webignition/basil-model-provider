<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Identifier;

use webignition\BasilModelProvider\Exception\UnknownIdentifierException;
use webignition\BasilModelProvider\Exception\UnknownItemException;

class EmptyIdentifierProvider implements IdentifierProviderInterface
{
    /**
     * @param string $name
     *
     * @return string
     *
     * @throws UnknownItemException
     */
    public function findIdentifier(string $name): string
    {
        throw new UnknownItemException(UnknownItemException::TYPE_IDENTIFIER, $name);
    }
}
