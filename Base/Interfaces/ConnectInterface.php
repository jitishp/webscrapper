<?php

namespace Base\Interfaces;

/**
 * Interface to connect to the given URL 
 */
interface ConnectInterface
{
    /**
     * Connects to the given URL and fetchs the content 
     *
     * @param string|null $url
     * @return void
     */
    public function connectAndFetch(?string $url): void;

    /**
     * Returns the HTML Content in string format
     *
     * @return string
     */
    public function getUrlContent(): string;
}
