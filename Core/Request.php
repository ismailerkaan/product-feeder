<?php

namespace ProductFeeder\Core;

class Request
{
    /**
     * @return string
     */
    public static function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * @return string
     */
    public static function getUrl(): string
    {
        return str_replace('/feeder', null, $_SERVER['REQUEST_URI']);
    }
}