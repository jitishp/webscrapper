<?php

namespace Base;

use Base\Interfaces\RawDataInterface;

/**
 *  @inheritDoc
 */
class Data implements RawDataInterface
{
    protected $rawData;

    /**
     * @inheritDoc
     */
    public function setRawData(string $completData): void
    {

        $this->rawData = $this->_dataToDom($completData);
    }

    /**
     * @inheritDoc
     */
    public function getRawData(): \DOMXPath
    {
        return $this->rawData;
    }

    /**
     * This function converts the HTML Source Code
     * in DOMDocument and returns the DOMXPath format
     * 
     * @param string $htmlContent
     * @return \DOMXPath
     */
    private function _dataToDom(string $htmlContent): \DOMXPath
    {
        $htmlContent = str_replace("&", "&amp;", $htmlContent);
        $dTa = new \DOMDocument('1.0', 'utf-8');
        $dTa->loadHTML($htmlContent);
        return new \DOMXPath($dTa);;
    }
}
