<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Identifier;

use webignition\BasilModelProvider\Exception\UnknownIdentifierException;
use webignition\BasilModelProvider\Identifier\IdentifierProvider;
use webignition\BasilModelProvider\Identifier\IdentifierProviderInterface;

class IdentifierProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(array $steps, IdentifierProviderInterface $expectedIdentifierProvider)
    {
        $this->assertEquals($expectedIdentifierProvider, new IdentifierProvider($steps));
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'identifiers' => [],
                'expectedIdentifierProvider' => new IdentifierProvider([]),
            ],
            'invalid identifiers' => [
                'identifiers' => [
                    1,
                    true,
                    [],
                ],
                'expectedIdentifierProvider' => new IdentifierProvider([]),
            ],
            'valid identifiers' => [
                'identifiers' => [
                    'heading' => '.heading',
                    'title' => '//title',
                ],
                'expectedIdentifierProvider' => new IdentifierProvider([
                    'heading' => '.heading',
                    'title' => '//title',
                ]),
            ],
        ];
    }

    public function testFindIdentifier()
    {
        $name = 'name';
        $identifier = '.selector';

        $identifierProvider = new IdentifierProvider([
            $name => $identifier,
        ]);

        $this->assertSame($identifier, $identifierProvider->findIdentifier($name));
    }

    public function testFindStepThrowsUnknownIdentifierException()
    {
        $this->expectException(UnknownIdentifierException::class);
        $this->expectExceptionMessage('Unknown identifier with name "name"');

        $provider = new IdentifierProvider([]);
        $provider->findIdentifier('name');
    }
}
