<?php

namespace App\Models;

class fibChecker
{
    public static function getFibonacci($n)
    {
        $fibonacci = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }
        return array_slice($fibonacci, 0, $n);
    }
}
