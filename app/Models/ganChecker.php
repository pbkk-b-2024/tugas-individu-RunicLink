<?php

namespace App\Models;

class ganChecker
{
    public static function getGanjilGenap($n)
    {
        $details = [];
        for ($i = 1; $i <= $n; $i++) {
            $details[] = $i . ' is ' . ($i % 2 == 0 ? 'Genap' : 'Ganjil');
        }
        return $details;
    }
}
