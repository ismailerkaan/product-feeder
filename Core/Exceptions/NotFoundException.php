<?php

namespace ProductFeeder\Core\Exceptions;

use Throwable;

class NotFoundException extends \Exception
{
    protected $message = "Page 404 Not Found";
    protected $code = 404;
}