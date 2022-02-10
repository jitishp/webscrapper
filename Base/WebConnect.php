<?php

namespace Base;

use Base\Interfaces\ConnectInterface;
use GuzzleHttp\Client;

/**
 * @inheritDoc
 */
class WebConnect implements ConnectInterface
{
    /**
     * @todo remove the constant and make it as an input from user
     */
    // const URL = "https://videx.comesconnected.com/";
    const URL = "https://jjroofingsupplies.co.uk/";

    /**
     * Holds the Client type object
     *
     * @var GuzzleHttp\Client
     */
    protected $httpConnection;
    /**
     * Stores the Content of the URL as String
     *
     * @var string
     */
    protected $content = "";

    public function __construct()
    {
        $this->httpConnection = new Client();
    }

    /**
     * @inheritDoc
     */
    public function connectAndFetch(?string $url = ""): void
    {
        $url = ($url == "") ? self::URL : $url;

        $this->content = (string) $this->httpConnection->get($url)->getBody();
    }

    /**
     * @inheritDoc
     */
    public function getUrlContent(): string
    {
        return $this->content;
    }
}
