<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilModelProvider\Tests\Unit\Page;

use Nyholm\Psr7\Uri;
use webignition\BasilModel\Identifier\IdentifierCollection;
use webignition\BasilModel\Page\Page;
use webignition\BasilModel\Step\Step;
use webignition\BasilModelProvider\Exception\UnknownPageException;
use webignition\BasilModelProvider\Exception\UnknownStepException;
use webignition\BasilModelProvider\Page\PageProvider;
use webignition\BasilModelProvider\Page\PageProviderInterface;

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
        $page = new Page(
            new Uri('http://example.com'),
            new IdentifierCollection()
        );

        $pageProvider = new PageProvider([
            $importName => $page,
        ]);

        $this->assertSame($page, $pageProvider->findPage($importName));
    }

    public function testFindPageThrowsUnknownPageException()
    {
        $this->expectException(UnknownPageException::class);
        $this->expectExceptionMessage('Unknown page "page_import_name"');

        $dataSetProvider = new PageProvider([]);
        $dataSetProvider->findPage('page_import_name');
    }
}
