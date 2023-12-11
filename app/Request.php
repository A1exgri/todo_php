<?php
namespace App;

class Request
{
    public static function uri()
    {
        $url = $_SERVER['REQUEST_URI'];
        return trim($url, '/');

    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function values()
    {
        $arr = [];
        foreach($_REQUEST as $key => $value) {
            if($key !== 'url') {
                $arr[$key] = $value;
            }
        }
        return $arr;
    }
}
