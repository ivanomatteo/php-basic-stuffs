<?php

namespace IvanoMatteo\PhpBasicStuffs;

use IvanoMatteo\PhpBasicStuffs\Exceptions\DateTimeFormatException;

class Time
{
    static function cronometer($func, $repeat = 1)
    {
        $time_start = microtime(true);
        for ($i = 0; $i < $repeat; $i++) {
            $func();
        }
        $time_end = microtime(true);
        return $time_end - $time_start;
    }

    static function dateTimeStr($timeStr = null, $format = 'Y-m-d H:i:s')
    {
        $ts = $timeStr ? strtotime($timeStr) : time();
        if ($ts === false) {
            throw new DateTimeFormatException("Wrong Format: " . $timeStr);
        }
        return date($format, $ts);
    }
    static function timeStr($timeStr = null, $format = 'H:i:s')
    {
        return static::dateTimeStr($timeStr, $format);
    }
}
