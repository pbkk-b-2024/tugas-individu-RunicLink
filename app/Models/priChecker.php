<?php

namespace App\Models;

class priChecker
{
    public static function getPrima($n)
    {
        $details = [];
        for ($i = 0; $i <= $n; $i++) {
            $details[] = $i . ' is ' . (self::isPrime($i) ? 'Prime' : 'Not prime');
        }
        return $details;
    }

    private static function isPrime($num)
    {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
