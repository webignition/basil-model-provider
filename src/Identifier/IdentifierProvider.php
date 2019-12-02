<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Identifier;

use webignition\BasilModelProvider\Exception\UnknownIdentifierException;

class IdentifierProvider implements IdentifierProviderInterface
{
    /**
     * @var string[]
     */
    private $identifiers = [];

    /**
     * @param string[] $identifiers
     */
    public function __construct(array $identifiers)
    {
        foreach ($identifiers as $name => $identifier) {
            if (is_string($identifier)) {
                $this->identifiers[$name] = $identifier;
            }
        }
    }

    /**
     * @param string $name
     *
     * @return string
     *
     * @throws UnknownIdentifierException
     */
    public function findIdentifier(string $name): string
    {
        $identifier = $this->identifiers[$name] ?? null;

        if (null === $identifier) {
            throw new UnknownIdentifierException($name);
        }

        return $identifier;
    }
}