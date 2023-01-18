<?php
function is_number ($number, int $min = 2, int $max = 10) : bool {
    return ($number >= $min && $number <= $max);
}

