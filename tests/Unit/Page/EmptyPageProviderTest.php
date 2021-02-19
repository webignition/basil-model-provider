<?php

declare(strict_types=1);

namespace webignition\BasilModelProvider\Tests\Unit\Page;

use webignition\BasilModelProvider\Exception\UnknownItemException;
use webignition\BasilModelProvider\Page\EmptyPageProvider;

class EmptyPageProviderTest extends \PHPUnit\Framework\TestCase
{
    public function testFindThrowsUnknownItemException(): void
    {
        $this->expectException(UnknownItemException::class);
        $this->expectExceptionMessage('Unknown page "page_import_name"');

        $provider = new EmptyPageProvider();
        $provider->find('page_import_name');
    }
}
