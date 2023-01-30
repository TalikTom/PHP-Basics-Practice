<?php

class Validator
{
    public static function string($value, $min = 1, $max = 140)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function number($value, $min = 2, $max = 10)
    {
        return is_numeric($value) >= $min && is_numeric($value) <= 10;
    }
}