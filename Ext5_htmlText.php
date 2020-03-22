<?php
trait convertToHTML {
    public function asH1($content) {
        return "<h1>$content</h1>";
    }
    public function asImg($urlImg, $alt) {
        return "<img src='$urlImg'alt='$alt' />";
    }
    
    //todo 2x podobné metody, která obalí obsah html tagem
}

abstract class Beer {
    protected $name; // název Piva
    protected $priceWithoutVAT; // cena za jedno pivo bez DPH
    protected $quantity; // počet zakoupených piv

    public function __construct($name,$priceWV, $quantity){
        $this->name = $name;
        $this->priceWithoutVAT = $priceWV;
        $this->quantity = $quantity;
    }

    // todo Setters
    // todo Getters

    /* abstraktní metoda pro výpočet ceny s DPH - v této třídě není možné definovat, protože existují dvě sazby DPH dle způsobu prodej piva*/
    abstract public function getPriceWithVAT():float;

    /* metoda vracející informace o daném pivu */
    public function info(){
        return $this->name."-".$this->getPriceWithVAT();
    }

    /* metoda vracející cenu s DPH pro zadaný počet zakoupených piv*/
    public function getPriceSum(){
        return $this->getPriceWithVAT() * $this->quantity;
    } 
}
/* třída - potomek Beer (Točené pivo), přebírá od rodiče vše včetně konstruktoru. Pouze definuje abstraktní metodu getPriceWithVat s 10% DPH*/
class BeerDraft extends Beer{
    use convertToHTML;
    public function getPriceWithVat():float{
        return $this->priceWithoutVAT*1.10;
    }
}

/* třída - potomek Beer (Lahvové pivo), přebírá od rodiče vše včetně konstruktoru. Pouze definuje abstraktní metodu getPriceWithVat s 21% DPH*/
class BeerBottled extends Beer{
    use convertToHTML;
    public function getPriceWithVat():float{
        return $this->priceWithoutVAT*1.21;
    }
}

// todo tvoje třída využívající trait convertToHTML

$beerOrder = new beerBottled("Prazdroj",23,5);
echo $beerOrder->info();
echo $beerOrder->asH1($beerOrder->getPriceSum());

?>