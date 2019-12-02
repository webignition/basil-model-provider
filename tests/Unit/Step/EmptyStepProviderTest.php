<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Step;

use webignition\BasilModelProvider\Exception\UnknownStepException;
use webignition\BasilModelProvider\Step\EmptyStepProvider;

class EmptyStepProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindStepThrowsUnknownStepException()
    {
        $this->expectException(UnknownStepException::class);
        $this->expectExceptionMessage('Unknown step "step_import_name"');

        $provider = new EmptyStepProvider();
        $provider->findStep('step_import_name');
    }
}
