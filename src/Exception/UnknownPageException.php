<?php

namespace webignition\BasilModelProvider\Exception;

class UnknownPageException extends AbstractUnknownImportException
{
    public function __construct(string $importName)
    {
        parent::__construct($importName, 'Unknown page "' . $importName . '"');
    }
}
