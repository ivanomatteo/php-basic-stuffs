<?php

namespace IvanoMatteo\PhpBasicStuffs;

class Num
{
    private static function throwException($var, $result) {
        
        if ($result === null) {
            throw new \Exception('Invalid Number Format: ' . $var);
        } else {
            return $result;
        }
    }

    public static function parseNum($var, $accept_float = false, $accept_exp = false, $throw = true) {
        
        $toR = (
            $accept_float
            ? self::parseFloat($var, false, $accept_exp)
            : self::parseInt ($var)
        );

        return (
            $throw
            ? self::throwException($var, $toR)
            : $toR
        );
    }


    private static function parseInt($v, $accept_float = false, $accept_exp = false)
    {
        $n = null;
        if (is_numeric($v)) {
            $n = intval($v);
            if (is_string($v)) {
                if (!$accept_float && preg_match('/[.]/', $v)) {
                    $n === null;
                } else if (!$accept_exp && preg_match('/[eE]/', $v)) {
                    $n === null;
                } else {
                    $v = trim($v);

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
            }else if(is_float($v)){
                if($v > PHP_INT_MAX || $v < PHP_INT_MIN){
                    $n = null;
                }
            }
        }

        return  $n;
    }

    private static function parseFloat($v, $accept_exp = true)
    {
        $n = null;
        if (is_numeric($v)) {
            $n = floatval($v);
            if (is_string($v)) {
                if (!$accept_exp && preg_match('/[eE]/', $v)) {
                    $n === null;
                }
            }
            if ($n === INF || $n === -INF || $n === NAN) {
                return null;
            }
        }

        return  $n;
    }
}
