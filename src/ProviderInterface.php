<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider;

use webignition\BasilModelProvider\Exception\UnknownItemException;

interface ProviderInterface
{
    /**
     * @param string $name
     *
     * @return mixed
     *
     * @throws UnknownItemException
     */
    public function find(string $name);
}
