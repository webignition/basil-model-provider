<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Exception;

class UnknownDataProviderException extends AbstractUnknownImportException
{
    public function __construct(string $importName)
    {
        parent::__construct($importName, 'Unknown data provider "' . $importName . '"');
    }
}
