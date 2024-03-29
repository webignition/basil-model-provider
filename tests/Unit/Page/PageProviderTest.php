<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\Page\PageProvider;
use webignition\BasilModels\Page\Page;

class PageProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     *
     * @param array<mixed> $pages
     */
    public function testCreate(array $pages, PageProvider $expectedPageProvider): void
    {
        $this->assertEquals($expectedPageProvider, new PageProvider($pages));
    }

    /**
     * @return array<mixed>
     */
    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'pages' => [],
                'expectedPageProvider' => new PageProvider([]),
            ],
            'invalid pages' => [
                'pages' => [
                    1,
                    true,
                    [],
                ],
                'expectedPageProvider' => new PageProvider([]),
            ],
            'valid pages' => [
                'pages' => [
                    'page one' => new Page('', 'http://example.com/one', []),
                    'page two' => new Page('', 'http://example.com/two', []),
                ],
                'expectedPageProvider' => new PageProvider([
                    'page one' => new Page('', 'http://example.com/one', []),
                    'page two' => new Page('', 'http://example.com/two', []),
                ]),
            ],
        ];
    }

    public function testFind(): void
    {
        $importName = 'page_import_name';
        $page = new Page($importName, 'http://example.com');

        $provider = new PageProvider([
            $importName => $page,
        ]);

        $this->assertSame($page, $provider->find($importName));
    }

    public function testFindThrowsUnknownItemException(): void
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown page "page_import_name"');

        $provider = new PageProvider([]);
        $provider->find('page_import_name');
    }
}
