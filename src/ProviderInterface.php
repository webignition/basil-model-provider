<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider;

use webignition\BasilModelProvider\Exception\UnknownItemException;

interface ProviderInterface
{
    /**
     * @throws UnknownItemException
     *
     * @return mixed
     */
    public function find(string $name);
}
