<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilModelProvider\Tests\Unit\Step;

use webignition\BasilModel\Step\Step;
use webignition\BasilModelProvider\Exception\UnknownStepException;
use webignition\BasilModelProvider\Step\StepProvider;
use webignition\BasilModelProvider\Step\StepProviderInterface;

class StepProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
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

        $stepProvider = new StepProvider([
            $importName => $step,
        ]);

        $this->assertSame($step, $stepProvider->findStep($importName));
    }

    public function testFindStepThrowsUnknownStepException()
    {
        $this->expectException(UnknownStepException::class);
        $this->expectExceptionMessage('Unknown step "step_import_name"');

        $dataSetProvider = new StepProvider([]);
        $dataSetProvider->findStep('step_import_name');
    }
}
