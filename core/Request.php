<?php
namespace App\Core;

class Request
{
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function get($key)
    {
        if ($key == 'all') {
            return array_map('validateData', $_REQUEST);
        }
        return validateData($_REQUEST[$key]);
    }
}
