<?php
//function is_number ($number, int $min = 2, int $max = 10) : bool {
//    return ($number >= $min && $number <= $max);
//}
//

class OIB
{


    public static function oibMaker()
    {

        //generate first 10 numbers
        $oib = '';

        for ($i = 0; $i < 10; $i++)
            $oib .= rand(0, 9);

        //get 11. number by  ISO 7064 (MOD 11, 10)
        $a = 10;

        for ($i = 0; $i < 10; $i++) {

            $a += (int)$oib[$i];
            $a %= 10;

            if ($a == 0) {
                $a = 10;
            }

            $a *= 2;
            $a %= 11;

        }

        $kontrolni = 11 - $a;

        //join first 10 with the 11. number
        $oib .= $kontrolni === 10 ? 0 : $kontrolni;

        return $oib;
    }

    public static function oibMore($rep)
    {
        $arrayOib = [];
        for ($i = 0; $i < $rep; $i++) {

            $arrayOib[$i] = OIB::oibMaker();
        }
        return $arrayOib;
    }


}

class LoveCalc {
    public static function countValues($a, $a2) {
        for ($i = 0; $i < count($a); $i++) {
            if (array_key_exists($a[$i], $a2)) {
                $a3[] = $a2[$a[$i]];
            }
        }
        return $a3;
    }
}


function authorize($condition, $status = Response::FORBIDDEN) {
    if(! $condition) {
        abort($status);
    }
}