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

// todo
?>