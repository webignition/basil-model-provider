<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\ProviderInterface;
use webignition\BasilModels\Step\StepInterface;

class StepProvider implements ProviderInterface
{
    /**
     * @var StepInterface[]
     */
    private $steps = [];

    /**
     * @param array<mixed> $steps
     */
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
     * @throws UnknownItemException
     */
    public function find(string $importName): StepInterface
    {
        $step = $this->steps[$importName] ?? null;

        if (null === $step) {
            throw new UnknownItemException(UnknownItemException::TYPE_STEP, $importName);
        }

        return $step;
    }
}
