<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Step;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\Step\StepProvider;
use webignition\BasilModels\Step\Step;

class StepProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     *
     * @param array<mixed> $steps
     */
    public function testCreate(array $steps, StepProvider $expectedStepProvider): void
    {
        $this->assertEquals($expectedStepProvider, new StepProvider($steps));
    }

    /**
     * @return array[]
     */
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

    public function testFind(): void
    {
        $importName = 'step_import_name';
        $step = new Step([], []);

        $provider = new StepProvider([
            $importName => $step,
        ]);

        $this->assertSame($step, $provider->find($importName));
    }

    public function testFindThrowsUnknownItemException(): void
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown step "step_import_name"');

        $provider = new StepProvider([]);
        $provider->find('step_import_name');
    }
}
