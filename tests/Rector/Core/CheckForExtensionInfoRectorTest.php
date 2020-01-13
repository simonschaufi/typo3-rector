<?php

namespace Ssch\TYPO3Rector\Tests\Rector\Core;

use Iterator;
use Ssch\TYPO3Rector\Tests\AbstractRectorWithConfigTestCase;

class CheckForExtensionInfoRectorTest extends AbstractRectorWithConfigTestCase
{
    /**
     * @dataProvider provideDataForTest()
     *
     * @param string $file
     */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    public function provideDataForTest(): Iterator
    {
        yield [__DIR__ . '/Fixture/check_for_info_instead_of_infopagetsconfig.php.inc'];
    }
}