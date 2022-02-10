<?php

/**
 * @author Jitish 
 * Main entry point to run the program
 * @command php scrapper.php
 */

use Test\Helper\TestData;

require 'vendor/autoload.php';

// libxml_use_internal_errors(true); // Suppress the HTML errors generating

//Connect to the URL given
$web = new Base\WebConnect();
$web->connectAndFetch();
$content = $web->getUrlContent();


//Convert the String format into DOMDocument and DOMXPath
$raw = new Base\Data();
$raw->setRawData($content);
$rawContent = $raw->getRawData();

//Return the required data in JSON
$parsed = new Base\ParsedData($rawContent);
echo $parsed->getDataInJson();
