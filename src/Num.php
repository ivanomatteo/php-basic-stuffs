<?php

namespace IvanoMatteo\PhpBasicStuffs;

use IvanoMatteo\PhpBasicStuffs\Exceptions\NumberFormatException;

class Num
{
    private static function notNull($original, $parsed)
    {
        if ($parsed === null) {
            throw new NumberFormatException('Invalid Number Format: ' . $original);
        } else {
            return $parsed;
        }
    }

    public static function parseNum($var, $accept_float = false, $accept_exp = false, $throwOnNull = true)
    {
        return ($accept_float
            ? static::parseFloat($var, $accept_exp, $accept_exp, $throwOnNull)
            : static::parseInt($var, false, $accept_exp, $throwOnNull));
    }


    public static function parseInt($v, $accept_float = false, $accept_exp = false, $throwOnNull = true)
    {
        $n = null;

        if (is_int($v)) {
            return $v;
        } else if (is_float($v)) {
            if ($accept_float) {
                if ($v > PHP_INT_MAX || $v < PHP_INT_MIN || $n === INF || $n === -INF || $n === NAN) {
                    $n = null;
                } else {
                    $n = intval($v);
                }
            } else {
                $n = null;
            }
        } else if (is_numeric($v)) { //  (!is_int() && !is_float() && is_numeric()) means also that is a string
            $v = trim($v);
            if (!$accept_float && preg_match('/[.]/', $v)) {
                $n = null;
            } else if (!$accept_exp && preg_match('/[eE]/', $v)) {
                $n = null;
            } else {
                $n = intval($v);
                if ($n === 0 && $v != 0) {
                    // piccolo trick, con stringhe numeriche molto grandi intval() restituisce 0
                    // però $stringaNumerica == 0 --> false
                    $n = null;
                } else if ($n === PHP_INT_MAX && $v !== ('' . PHP_INT_MAX)) {
                    $n = null;
                } else if ($n === PHP_INT_MIN && $v !== ('' . PHP_INT_MIN)) {
                    $n = null;
                }
            }
        }

        return  $throwOnNull ? static::notNull($v, $n) : $n;
    }

    public static function parseFloat($v, $accept_exp = true, $throwOnNull = true)
    {
        $n = null;
        if (is_numeric($v)) {
            $n = floatval($v);
            if (is_string($v)) {
                if (!$accept_exp && preg_match('/[eE]/', $v)) {
                    $n = null;
                }
            }
            if ($n === INF || $n === -INF || $n === NAN) {
                return null;
            }
        }

        return  $throwOnNull ? static::notNull($v, $n) : $n;
    }
}
