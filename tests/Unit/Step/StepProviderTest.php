<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Step;

use webignition\BasilModelProvider\Exception\UnknownStepException;
use webignition\BasilModelProvider\Step\StepProvider;
use webignition\BasilModelProvider\Step\StepProviderInterface;
use webignition\BasilModels\Step\Step;

class StepProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     *
     * @param array<mixed> $steps
     * @param StepProviderInterface $expectedStepProvider
     */
    public function testCreate(array $steps, StepProviderInterface $expectedStepProvider)
    {
        $this->assertEquals($expectedStepProvider, new StepProvider($steps));
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'steps' => [],
                'expectedStepProvider' => new StepProvider([]),
            ],
            'invalid steps' => [
                'steps' => [
                    1,
                    true,
                    [],
                ],
                'expectedStepProvider' => new StepProvider([]),
            ],
            'valid steps' => [
                'steps' => [
                    'step one' => new Step([], []),
                    'step two' => new Step([], []),
                ],
                'expectedStepProvider' => new StepProvider([
                    'step one' => new Step([], []),
                    'step two' => new Step([], []),
                ]),
            ],
        ];
    }

    public function testFindStep()
    {
        $importName = 'step_import_name';
        $step = new Step([], []);

        $provider = new StepProvider([
            $importName => $step,
        ]);

        $this->assertSame($step, $provider->findStep($importName));
    }

    public function testFindStepThrowsUnknownStepException()
    {
        $this->expectException(UnknownStepException::class);
        $this->expectExceptionMessage('Unknown step "step_import_name"');

        $provider = new StepProvider([]);
        $provider->findStep('step_import_name');
    }
}
