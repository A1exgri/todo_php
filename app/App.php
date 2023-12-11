<?php

namespace App;

class App
{
    protected static $configarr = [];

    public static function bind($key, $value)
    {
        static::$configarr[$key] = $value;
    }

    public static function get($key)
    {
        return static::$configarr[$key];
    }
}
