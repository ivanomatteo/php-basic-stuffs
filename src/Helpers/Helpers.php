<?php

namespace IvanoMatteo\PhpBasicStuffs\Helpers;

class Helpers
{
    public static function load($ignore_warnings = false)
    {
        static::$ignore_warnings = $ignore_warnings;
        require_once __DIR__ . '/helpers_func.php';
    }

    public static $ignore_warnings = false;
}


function function_not_exists($f)
{
    if (function_exists($f)) {
        Helpers::$ignore_warnings || trigger_error($f . '() alredy defined');
        return false;
    }
    return true;
}
