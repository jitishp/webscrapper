<?php

namespace Base\Interfaces;

/**
 * ParsedData interface
 */
interface ParsedDataInterface
{

    /**
     * Function to get the final data in Array Format from HTML Document
     *
     * @return array
     */
    public function getActualData(): array;

    /**
     * Function to get the final data in JSON Format from HTML Document
     *
     * @return string
     */
    public function getDataInJson(): string;
}
