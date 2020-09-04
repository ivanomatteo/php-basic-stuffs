<?php

namespace IvanoMatteo\PhpBasicStuffs;

use IvanoMatteo\PhpBasicStuffs\Exceptions\DateTimeFormatException;

class Time
{
    public static function cronometer($func, $repeat = 1)
    {
        $time_start = microtime(true);
        for ($i = 0; $i < $repeat; $i++) {
            $func();
        }
        $time_end = microtime(true);
        return $time_end - $time_start;
    }

    public static function dateTimeStr($timeStr = null, $format = null)
    {

        $ts = $timeStr ? strtotime($timeStr) : time();
        if ($ts === false) {
            throw new DateTimeFormatException("Wrong Format: " . $timeStr);
        }
        return date($format ?? 'Y-m-d H:i:s', $ts);
    }
    public static function timeStr($timeStr = null, $format = null)
    {
        return static::dateTimeStr($timeStr, $format ?? 'H:i:s');
    }
}
