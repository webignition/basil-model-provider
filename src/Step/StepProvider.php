<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModelProvider\Exception\UnknownStepException;
use webignition\BasilModels\Step\StepInterface;

class StepProvider implements StepProviderInterface
{
    private $steps = [];

    public function __construct(array $steps)
    {
        foreach ($steps as $importName => $step) {
            if ($step instanceof StepInterface) {
                $this->steps[$importName] = $step;
            }
        }
    }

    /**
     * @param string $importName
     *
     * @return StepInterface
     *
     * @throws UnknownStepException
     */
    public function findStep(string $importName): StepInterface
    {
        $step = $this->steps[$importName] ?? null;

        if (null === $step) {
            throw new UnknownStepException($importName);
        }

        return $step;
    }
}
