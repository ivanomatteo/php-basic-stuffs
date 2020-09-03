<?php

use IvanoMatteo\PhpBasicStuffs\Num;
use IvanoMatteo\PhpBasicStuffs\Str;
use IvanoMatteo\PhpBasicStuffs\Time;

/**
 * this class is used only to trigger the autoloading 
 * 
 * method 1
 * \BasicStuffHelpers::load();
 * 
 * method 2
 * class_exists('BasicStuffHelpers');
 * 
 */
class BasicStuffHelpers
{
    public static function load()
    {
    }
}


function dd($v)
{
    die("<pre>" . print_r($v, true) . "</pre>");
}

function startsWith($haystack, $needles)
{
    return Str::startsWith($haystack, $needles);
}

function endsWith($haystack, $needles)
{
    return Str::endsWith($haystack, $needles);
}


function cronometer($func, $repeat = 1)
{
    return Time::cronometer($func, $repeat);
}


function parseInt($v, $accept_float = false, $accept_exp = false, $throw = true)
{
    return Num::parseInt($v, $accept_float, $accept_exp, $throw);
}


function parseFloat($v, $accept_exp = true,  $throw = true)
{
    return Num::parseFloat($v, $accept_exp,  $throw);
}
