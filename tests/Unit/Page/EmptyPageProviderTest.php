<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace webignition\BasilModelProvider\Tests\Unit\Page;

use webignition\BasilModelProvider\Exception\UnknownPageException;
use webignition\BasilModelProvider\Page\EmptyPageProvider;

class EmptyPageProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindPageThrowsUnknownPageException()
    {
        $this->expectException(UnknownPageException::class);
        $this->expectExceptionMessage('Unknown page "page_import_name"');

        $dataSetProvider = new EmptyPageProvider();
        $dataSetProvider->findPage('page_import_name');
    }
}
