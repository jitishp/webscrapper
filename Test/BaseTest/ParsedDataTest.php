<?php

namespace Test\BaseTest;

use Test\Helper\TestData as TData;
use Base\ParsedData;
use Base\Data;

class ParsedDataTest extends \PHPUnit\Framework\TestCase
{

    public static function commonParameters(): ParsedData
    {
        $htmlContent = TData::HTML_CONTENT;
        $dataObj    = new Data();

        $dataObj->setRawData($htmlContent);
        $dataVal = $dataObj->getRawData();

        $parsedObj = new ParsedData($dataVal);
        return $parsedObj;
    }


    public function testGetActualData(): void
    {

        $parsedObj = self::commonParameters();
        $resultExpectedArray = $parsedObj->getActualData();

        $this->assertIsArray($resultExpectedArray);

        $actualDiscount = $resultExpectedArray[0]['discount'];
        $testDiscount   = TData::ARRAY_CONTENT[0]['discount'];

        $this->assertEquals($testDiscount, $actualDiscount);
        $this->assertNotEquals("Save £17.95", $actualDiscount);
    }


    public function testGetDataInJson(): void
    {

        $parsedObj = self::commonParameters();
        $resultExpectedJson = $parsedObj->getDataInJson();
        $expectedJsonArray = \json_decode(TData::JSON_CONTENT);

        $this->assertIsString($resultExpectedJson);
        $this->assertIsArray($expectedJsonArray);
    }
}
