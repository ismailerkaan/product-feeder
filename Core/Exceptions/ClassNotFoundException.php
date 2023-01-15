<?php

namespace ProductFeeder\Core\Exceptions;

use Throwable;

class ClassNotFoundException extends \Exception
{
    protected $message = "Class Not Found";
    protected $code = 404;
}