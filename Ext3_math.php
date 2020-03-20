<?php
    class MyMath{
        const PI = 3.14;
        public static function powerNumber($number, $power){
            $res = 1;
            for ($i=0; $i < $power; $i++) { 
                $res *= $number;
            }
            return $res;
        }
        
        public static function linearEquation($a,$b){
            if ($a == 0) {
                $res = false;
            }
            elseif ($b == 0) {
                $res = 0;
            }
            else {
                $res = -$b/$a;
            }
            return $res;
        }
        
        public static function abs($number){
            if ($number < 0) {
                return -$number;
            }
            else{
                return $number;
            }
        }
    }

        echo MyMath::PI."<br>";
        echo MyMath::powerNumber(3,2)."<br>";
        echo MyMath::linearEquation(5,5)."<br>";
        echo MyMath::abs(4)."<br>";
?>