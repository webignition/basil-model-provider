<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\Step\StepInterface;

interface StepProviderInterface extends ProviderInterface
{
    /**
     * @throws UnknownItemException
     */
    public function find(string $name): StepInterface;
}
