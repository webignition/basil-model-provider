<?php

namespace webignition\BasilModelProvider\Exception;

class UnknownStepException extends AbstractUnknownImportException
{
    public function __construct(string $importName)
    {
        parent::__construct($importName, 'Unknown step "' . $importName . '"');
    }
}
