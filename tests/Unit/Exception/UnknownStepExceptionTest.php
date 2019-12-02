<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Exception;

use webignition\BasilModelProvider\Exception\UnknownStepException;

class UnknownStepExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function testGetMessage()
    {
        $importName = 'step_import_name';

        $exception = new UnknownStepException($importName);

        $this->assertSame('Unknown step "step_import_name"', $exception->getMessage());
    }

    public function testGetImportName()
    {
        $importName = 'step_import_name';

        $exception = new UnknownStepException($importName);

        $this->assertSame($importName, $exception->getImportName());
    }
}
