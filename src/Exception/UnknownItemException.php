<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Exception;

use webignition\BasilContextAwareException\ContextAwareExceptionInterface;
use webignition\BasilContextAwareException\ContextAwareExceptionTrait;
use webignition\BasilContextAwareException\ExceptionContext\ExceptionContext;

class UnknownItemException extends \Exception implements ContextAwareExceptionInterface
{
    use ContextAwareExceptionTrait;

    public const TYPE_DATASET = 'dataset';
    public const TYPE_IDENTIFIER = 'identifier';
    public const TYPE_PAGE = 'page';
    public const TYPE_STEP = 'step';

    private string $type;
    private string $name;

    public function __construct(string $type, string $name)
    {
        parent::__construct(sprintf('Unknown %s "%s"', $type, $name));

        $this->type = $type;
        $this->name = $name;
        $this->exceptionContext = new ExceptionContext();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
