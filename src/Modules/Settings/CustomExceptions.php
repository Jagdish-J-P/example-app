<?php

namespace Modules\Settings;

use Exception;

class CustomExceptions extends Exception
{
    public static function noValueProvided()
    {
        return new self('No value provided', 400);
    }

    public static function throwException($message, $code = 0)
    {
        throw new \Exception($message, $code);
    }
}
