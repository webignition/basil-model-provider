<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Identifier;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\Identifier\IdentifierProvider;

class IdentifierProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     *
     * @param array<string, string> $identifiers
     * @param IdentifierProvider $expectedIdentifierProvider
     */
    public function testCreate(array $identifiers, IdentifierProvider $expectedIdentifierProvider)
    {
        $this->assertEquals($expectedIdentifierProvider, new IdentifierProvider($identifiers));
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

    public function testFind()
    {
        $name = 'name';
        $identifier = '.selector';

        $identifierProvider = new IdentifierProvider([
            $name => $identifier,
        ]);

        $this->assertSame($identifier, $identifierProvider->find($name));
    }

    public function testFindThrowsUnknownItemException()
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown identifier "name"');

        $provider = new IdentifierProvider([]);
        $provider->find('name');
    }
}
