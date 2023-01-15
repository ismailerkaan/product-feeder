<?php

namespace ProductFeeder\Core\Exceptions;

class MethodNotFoundException extends \Exception
{
    protected $message = "Method Not Found";
    protected $code = 404;
}
