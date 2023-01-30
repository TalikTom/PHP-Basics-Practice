<?php

class Validator
{
    public static function string($value, $min = 1, $max = 140)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function number($value)
    {
        return is_numeric($value);
    }
}