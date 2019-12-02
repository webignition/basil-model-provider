<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Identifier;

use webignition\BasilModelProvider\Exception\UnknownIdentifierException;

interface IdentifierProviderInterface
{
    /**
     * @param string $name
     *
     * @return string
     *
     * @throws UnknownIdentifierException
     */
    public function findIdentifier(string $name): string;
}
