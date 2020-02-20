<?php
/**
 * Description of class Main
 *
 * @author Ivan Miljanic <ivanvk95@gmail.com>
 */

class Main {
    
    const COLOR1 = "0000cc";
    const COLOR2 = "cc0000";


    
    public function __construct() {}

    public function newDate($get) {

        return DateTime::createFromFormat("Ymd", $get);
    }

    public function newColor($red, $blue) : string {

        if($red > $blue) {
            $f = $red / 100;
        } elseif($red < $blue) {
            $f = (100 - $blue) / 100;
        } elseif($red == $blue) {
            $f = $blue / 100;
        }

        list($r1,$g1,$b1) = str_split( ltrim( self::COLOR1, '#' ), 2);
        list($r2,$g2,$b2) = str_split( ltrim( self::COLOR2, '#' ), 2);

        $r = ( hexdec( $r1 ) * ( 1 - $f )+hexdec( $r2 ) * $f);
        $g = ( hexdec( $g1 ) * ( 1 - $f )+hexdec( $g2 ) * $f);
        $b = ( hexdec( $b1 ) * ( 1 - $f )+hexdec( $b2 ) * $f);

        $newColor = '#'.sprintf("%02s",dechex($r)).sprintf("%02s",dechex($g)).sprintf("%02s",dechex($b));

        return $newColor;
	}


   
}