<?php

use IvanoMatteo\PhpBasicStuffs\Num;
use IvanoMatteo\PhpBasicStuffs\Str;
use IvanoMatteo\PhpBasicStuffs\Time;

use function IvanoMatteo\PhpBasicStuffs\Helpers\function_not_exists;

if (function_not_exists('dd')) {
    function dd($v)
    {
        die("<pre>" . print_r($v, true) . "</pre>");
    }
}

if (function_not_exists('startsWith')) {
    function startsWith($haystack, $needles)
    {
        return Str::startsWith($haystack, $needles);
    }
}

if (function_not_exists('endsWith')) {
    function endsWith($haystack, $needles)
    {
        return Str::endsWith($haystack, $needles);
    }
}

if (function_not_exists('cronometer')) {
    function cronometer($func, $repeat = 1)
    {
        return Time::cronometer($func, $repeat);
    }
}
if (function_not_exists('dateTimeStr')) {
    function dateTimeStr($timeStr = null, $format = null)
    {
        return Time::dateTimeStr($timeStr, $format);
    }
}
if (function_not_exists('timeStr')) {
    function timeStr($timeStr = null, $format = null)
    {
        return Time::timeStr($timeStr, $format);
    }
}

if (function_not_exists('parseNum')) {
    function parseNum($v, $accept_float = false, $accept_exp = false, $throw = true)
    {
        return Num::parseNum($v, $accept_float, $accept_exp, $throw);
    }
}

if (function_not_exists('parseInt')) {
    function parseInt($v, $accept_float = false, $accept_exp = false, $throw = true)
    {
        return Num::parseInt($v, $accept_float, $accept_exp, $throw);
    }
}

if (function_not_exists('parseFloat')) {
    function parseFloat($v, $accept_exp = true, $throw = true)
    {
        return Num::parseFloat($v, $accept_exp, $throw);
    }
}
