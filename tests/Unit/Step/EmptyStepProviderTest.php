<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\Step\EmptyStepProvider;

class EmptyStepProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindThrowsUnknownItemException()
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown step "step_import_name"');

        $provider = new EmptyStepProvider();
        $provider->find('step_import_name');
    }
}
