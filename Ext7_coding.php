<?php
/* Třída - rodič pro potomky, představující třídy pro kódování a dekodování textu */
abstract class codingString{
    protected $nameCoding; // název Kódování např. "Konverze text do Morzeovy abecedy"
    
    public function __construct($nameC){
        $this->nameCoding = $nameC;
    }

    public function getnameCoding(){
        return $this->nameCoding;
    }

    public function setnameCoding($nameC){
        $this->nameCoding = $nameC;
    }

    public abstract function coding($text) : string; // metoda pro kódování text
    public abstract function decoding ($Code) : string; // metoda pro dekódování textu
    public abstract function info() : string; //  výpis informací o typu kódování
}

/* Třída MorseABC - potomek třídy codingString. Třída umožňuje kódovat text do morseovy abecedy a z morseovy abecedy na text */

class Morse extends CodingString{
    public function coding($text) : string{
    $string_lower = strtolower($text);
    $assoc_array = array(
        "a"=>".-",
        "b"=>"-...", 
        "c"=>"-.-.", 
        "d"=>"-..", 
        "e"=>".", 
        "f"=>"..-.", 
        "g"=>"--.", 
        "h"=>"....", 
        "i"=>"..", 
        "j"=>".---", 
        "k"=>"-.-", 
        "l"=>".-..", 
        "m"=>"--", 
        "n"=>"-.", 
        "o"=>"---", 
        "p"=>".--.", 
        "q"=>"--.-", 
        "r"=>".-.", 
        "s"=>"...", 
        "t"=>"-", 
        "u"=>"..-", 
        "v"=>"...-", 
        "w"=>".--", 
        "x"=>"-..-", 
        "y"=>"-.--", 
        "z"=>"--..", 
        "0"=>"-----",
        "1"=>".----", 
        "2"=>"..---", 
        "3"=>"...--", 
        "4"=>"....-", 
        "5"=>".....", 
        "6"=>"-....", 
        "7"=>"--...", 
        "8"=>"---..", 
        "9"=>"----.",
        "."=>".-.-.-",
        ","=>"--..--",
        "?"=>"..--..",
        "/"=>"-..-.",
        " "=>" ");

        $code = "";
        for($i=0;$i<strlen($string_lower);$i++){
            $index = $string_lower[$i];       
            $code .= $assoc_array["$index"]." ";
               
        }
        return $code;
    }

    public function decoding($code) : String {

    }

    public function info() : String {

    }
}

$Morsecoding = new Morse("Kódování morseovka");
echo $Morsecoding -> coding("Ahoj");
?>