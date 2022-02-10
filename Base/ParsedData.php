<?php

namespace Base;

use Base\Interfaces\ParsedDataInterface;
use Base\Interfaces\RawDataInterface;
use Gt\CssXPath\Translator;

class ParsedData implements ParsedDataInterface
{
    protected $xPATH;
    protected $rawData;
    protected $parsedData;


    const MAIN_BODY = 'div.package';
    const PACKAGE_TITLE = 'div.header>h3';
    const PACKAGE_DESCRIPTION = '.package-features .package-name';
    const PACKAGE_PRICE = '.package-features .package-price .price-big';
    const PACKAGE_DISCOUNT = '.package-features .you-save"';

    const FORMAT_CURRENCY = 'currency';
    const FORMAT_PLAIN    = 'plain';

    public function __construct(\DOMXPath $rawData)
    {
        $this->xPATH = $rawData;
        $translator = $this->_getTranslator(self::MAIN_BODY);
        $this->rawData = $rawData->query($translator); // Get the main place holders for the products 
    }

    private function _populateData(): array
    {

        $_data = [];
        if ($this->rawData) {
            foreach ($this->rawData as $rData) {

                $data['option_title'] = $this->_formatOutput($this->_setOption($rData, 'title'));
                $data['description'] = $this->_formatOutput($this->_setOption($rData, 'description'));
                $data['price'] = $this->_formatOutput($this->_setOption($rData, 'price'), self::FORMAT_CURRENCY);
                $data['discount'] = $this->_formatOutput($this->_setOption($rData, 'discount'), self::FORMAT_CURRENCY);

                array_push($_data, $data);
            }
        }


        return $_data;
    }

    private function _formatOutput($op, $type = self::FORMAT_PLAIN)
    {
        switch ($type) {
            case self::FORMAT_CURRENCY:
                return $this->_outputAsDecimal($op);
                break;
            case self::FORMAT_PLAIN:
                return trim($op);
                break;
        }
    }

    private function _outputAsDecimal($value): float
    {

        $getFloat = preg_replace('/[aA-zZ£]+/', '', $value);

        list($intPart, $decimalPart) = explode(".", $getFloat);

        $intPart = preg_replace('/[\W]+/', '', $intPart);
        $decimalPart = preg_replace('/[\W]+/', '', $decimalPart);

        $floatNumber = floatval($intPart . "." . $decimalPart);

        return (is_float($floatNumber)) ? $floatNumber : 0.00;
    }
    private function _getTranslator($queryType)
    {
        return new Translator($queryType);
    }

    private function _setOption($parent, $type): string
    {
        $translate = '';
        switch ($type) {
            case 'title':
                $translate = self::PACKAGE_TITLE;
                break;
            case 'description':
                $translate = self::PACKAGE_DESCRIPTION;
                break;
            case 'price':
                $translate = self::PACKAGE_PRICE;
                break;
            case 'discount':
                $translate = self::PACKAGE_DISCOUNT;
                break;
        }
        $translator = $this->_getTranslator($translate);
        $childElement = $this->xPATH->query($translator, $parent);
        return ($childElement->length > 0) ? $childElement->item(0)->nodeValue : "";
    }

    public function getActualData(): array
    {
        return $this->_populateData();
    }

    public function getDataInJson(): string
    {
        return \json_encode($this->_populateData(), JSON_PRETTY_PRINT);
    }

    public function getTotalNumberOfBlocks($nodes): int
    {
        return $nodes->length;
    }
}
