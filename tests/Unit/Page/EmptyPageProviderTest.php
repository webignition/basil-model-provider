<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Page;

use webignition\BasilModelProvider\Exception\UnknownPageException;
use webignition\BasilModelProvider\Page\EmptyPageProvider;

class EmptyPageProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindPageThrowsUnknownPageException()
    {
        $this->expectException(UnknownPageException::class);
        $this->expectExceptionMessage('Unknown page "page_import_name"');

        $provider = new EmptyPageProvider();
        $provider->findPage('page_import_name');
    }
}
