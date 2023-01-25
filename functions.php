<?php
//function is_number ($number, int $min = 2, int $max = 10) : bool {
//    return ($number >= $min && $number <= $max);
//}
//

class OIB
{


    public static function oibMaker()
    {
        $oib= '';

        for ($i = 0; $i < 10; $i++)
            $oib .= rand(0, 9);

        $a = 10;

        for ($i = 0; $i < 10; $i++) {

            $a += (int)$oib[$i];
            $a %= 10;

            if ( $a == 0 ) { $a = 10; }

            $a *= 2;
            $a %= 11;

        }

        $kontrolni = 11 - $a;


        return $oib . ($kontrolni === 10 ? 0 : $kontrolni);
    }
}