<?php
    abstract class Obrazec{
        private $stranaA;
        private $stranaB;

        public function __construct($a,$b){
            $this -> stranaA = $a;
            $this -> stranaB = $b;
        }

        public function getA(){
            return $this->stranaA;
        }

        public function getB(){
            return $this->stranaB;
        }

        public function setA($a){
            if ($a>=0) {
                $this->stranaA = $a;
            }
        }

        public function setB($b){
            if ($a>=0) {
                $this->stranaB = $b;
            }
        }

        public abstract function obsah() : float;
    }

    class ctverec extends Obrazec{
        public function obsah() : float{
            return $this->getA() * $this->getA();
        }
    }

    class obdelnik extends Obrazec{
        public function obsah() : float{
            return $this->getA() * $this->getB();
        }
    }

    $obdelnik1 = new Obdelnik(5,5);
    echo $obdelnik1->obsah();
?>