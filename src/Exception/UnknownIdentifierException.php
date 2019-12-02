<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Exception;

class UnknownIdentifierException extends \Exception
{
    private $name;

    public function __construct(string $name)
    {
        parent::__construct('Unknown identifier with name "' . $name . '"');

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
