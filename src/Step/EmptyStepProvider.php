<?php

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModel\Step\StepInterface;
use webignition\BasilModelProvider\Exception\UnknownStepException;

class EmptyStepProvider implements StepProviderInterface
{
    /**
     * @param string $importName
     *
     * @return StepInterface
     *
     * @throws UnknownStepException
     */
    public function findStep(string $importName): StepInterface
    {
        throw new UnknownStepException($importName);
    }
}
