<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\Step\StepInterface;

class EmptyStepProvider implements ProviderInterface
{
    /**
     * @param string $importName
     *
     * @return StepInterface
     *
     * @throws UnknownItemException
     */
    public function find(string $importName): StepInterface
    {
        throw new UnknownItemException(UnknownItemException::TYPE_STEP, $importName);
    }
}
