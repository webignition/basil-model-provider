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
    private $items = [];

    /**
     * @param array<mixed> $steps
     */
    public function __construct(array $steps)
    {
        foreach ($steps as $name => $step) {
            if ($step instanceof StepInterface) {
                $this->items[$name] = $step;
            }
        }
    }

    /**
     * @param string $name
     *
     * @return StepInterface
     *
     * @throws UnknownItemException
     */
    public function find(string $name): StepInterface
    {
        $step = $this->items[$name] ?? null;

        if (null === $step) {
            throw new UnknownItemException(UnknownItemException::TYPE_STEP, $name);
        }

        return $step;
    }
}
