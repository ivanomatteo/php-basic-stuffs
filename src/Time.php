<?php

class Time
{
    function cronometer($func, $repeat = 1)
    {
        $time_start = microtime(true);
        for ($i = 0; $i < $repeat; $i++) {
            $func();
        }
        $time_end = microtime(true);
        return $time_end - $time_start;
    }
}
