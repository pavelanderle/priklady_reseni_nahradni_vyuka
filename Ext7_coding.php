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
    const MORSECODE = array(  // definování constanty pole s morseovou abecedou 
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

        /* implementace metody coding */
    public function coding($text) : string{
        $this->setnameCoding("Kódování textu do Morseovy abecedy"); // nastavení atributu $nameCoding
        $string_lower = strtolower($text); // převod všech znaků vstupního paramaetru na malé znaky
        $code = ""; // nastavení počáteční hodnoty proměnné $code
        
        /* for cyklus, kterým projdeme celý zadaný text */
        for($i=0;$i<strlen($string_lower);$i++){
            $index = $string_lower[$i]; // přiřazení aktuálního znaku dle iterace do proměnné $index      
            $code .= SELF::MORSECODE["$index"]." "; // Převod znaku na morse code např. SELF::MORSECODE["A"] => ".-"
               
        }
        return $code; // návratová hodnota $code .= SELF::MORSECODE["$index"] je to samé jako $code = $code.SELF::MORSECODE["$index"]
    }

    /* implementace metody decoding */
    public function decoding($code) : String {
        $this->setnameCoding("Převod kódu v Morseově abecedě na text"); // nastavení atributu $nameCoding
        $codeExplode = explode("|",$code); // rozdělení Morse codu dle | (podmínka pro zadání codu - morse znaky odděleny |)
        $text = ""; // nastavení počáteční hodnoty proměnné $code
        
        /* Foreach, který prochází pole se znaky v Morse codu - pole získáno pomocí fce explode */
        foreach ($codeExplode as $char) { 
            /* Foreach, který procází pole s kódem morseovy abecedy */
            foreach (SELF::MORSECODE as $key => $codeItem) {
                if ($codeItem == $char) { // porovnání kodu znaku v MORSECODE a codeExplode
                    $text .= $key; // v případě rovnosti přiřazení indexu $key do výsledného textu
                }
            }
        }
        return $text; // vrácení výsledného dekodovaného textu
    }

    public function info() : String {
        return "Nyní používáte kódování: ".$this->nameCoding;
    }
}

$morsecoding = new Morse("Kódování morseovka");
echo "<h2>". $morsecoding->info()."</h2>";
echo $morsecoding -> coding("Ahoj");
echo $morsecoding -> decoding(".-|....|---|.---");
?>