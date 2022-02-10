<?php

namespace Base\Interfaces;

/**
 * Interface to deal with the HTML Content, convert it into DOMHTML format 
 * before any other operation is applied
 */
interface RawDataInterface
{
    /**
     * Collects the HTML Source code and store the DOMXpath format as a property
     *
     * @param string $completData
     * @return void
     */
    public function setRawData(string $completData): void;

    /**
     * This function is a getter function to access the DOMXpath object
     *
     * @return \DOMXPath
     */
    public function getRawData(): \DOMXPath;
}
