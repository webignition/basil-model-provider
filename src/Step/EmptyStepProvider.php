<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\Step\StepInterface;

class EmptyStepProvider implements StepProviderInterface
{
    /**
     * @throws UnknownItemException
     */
    public function find(string $name): StepInterface
    {
        throw new UnknownItemException(UnknownItemException::TYPE_STEP, $name);
    }
}
