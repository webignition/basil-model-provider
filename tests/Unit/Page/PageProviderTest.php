<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Page;

use webignition\BasilModelProvider\Exception\UnknownPageException;
use webignition\BasilModelProvider\Page\PageProvider;
use webignition\BasilModelProvider\Page\PageProviderInterface;
use webignition\BasilModels\Page\Page;
use webignition\BasilModels\Step\Step;

class PageProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(array $pages, PageProviderInterface $expectedPageProvider)
    {
        $this->assertEquals($expectedPageProvider, new PageProvider($pages));
    }

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
                    'step one' => new Step([], []),
                    'step two' => new Step([], []),
                ],
                'expectedPageProvider' => new PageProvider([
                    'step one' => new Step([], []),
                    'step two' => new Step([], []),
                ]),
            ],
        ];
    }

    public function testFindPage()
    {
        $importName = 'page_import_name';
        $page = new Page('http://example.com');

        $provider = new PageProvider([
            $importName => $page,
        ]);

        $this->assertSame($page, $provider->findPage($importName));
    }

    public function testFindPageThrowsUnknownPageException()
    {
        $this->expectException(UnknownPageException::class);
        $this->expectExceptionMessage('Unknown page "page_import_name"');

        $provider = new PageProvider([]);
        $provider->findPage('page_import_name');
    }
}
