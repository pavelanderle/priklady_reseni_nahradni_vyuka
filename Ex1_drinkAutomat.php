<?php
    class drinkAutomat{
        const DRINK = array(array("kava",20),array("caj",15),array("Coca cola",25),array("Pivo",35));

        public function getDrink($numberDrink){
            return self::DRINK[$numberDrink][0];
        }
        
        public function returnMoney($money, $numberDrink){
            $returnMoney=$money-self::DRINK[$numberDrink][1];
            if ($returnMoney>0) {
                return $returnMoney;
            }
            else {
                return false;
            }
        }
    }

    $automat1 = new drinkAutomat();
    echo $automat1 -> getDrink(1);
    echo $automat1->returnMoney(100,2);
?>