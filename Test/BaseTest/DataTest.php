<?php

namespace Test\BaseTest;

use Test\Helper\TestData as TData;
use Base\Data;


class DataTest extends \PHPUnit\Framework\TestCase
{
    public function testRawData(): void
    {
        $testCompleteData = TData::HTML_CONTENT;

        $dataTest = new Data();

        $dataTest->setRawData($testCompleteData);
        $this->assertInstanceOf(\DOMXPath::class, $dataTest->getRawData());
    }
}
