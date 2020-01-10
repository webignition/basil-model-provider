<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModels\Step\StepInterface;

class EmptyStepProvider implements StepProviderInterface
{
    /**
     * @param string $importName
     *
     * @return StepInterface
     *
     * @throws UnknownItemException
     */
    public function findStep(string $importName): StepInterface
    {
        throw new UnknownItemException(UnknownItemException::TYPE_STEP, $importName);
    }
}
