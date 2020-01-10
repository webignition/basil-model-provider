<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Identifier;

use webignition\BasilModelProvider\Exception\UnknownItemException;

interface IdentifierProviderInterface
{
    /**
     * @param string $name
     *
     * @return string
     *
     * @throws UnknownItemException
     */
    public function findIdentifier(string $name): string;
}
