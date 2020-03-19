<?php
    class person{
        protected $firstname;
        protected $surname;
        protected $age;
    
        public function __construct($fn,$sn,$ag){
            $this->firstname = $fn;
            $this->surname = $sn;
            $this->age = $ag;
        }
    
        public function getFirstname(){
            return $this->firstname;
        }
        public function getSurname(){
            return $this->surname;
        }
        public function getAge(){
            return $this->age;
        }
    
        public function setFirstname($fn){
            $this->firstname = $fn;
        }
    
        public function setSurname($sn){
            $this->firstname = $sn;
        }
    
        public function setAge($ag){
            if ($ag>0) $this->age = $ag;
        }
    
        public function getInfoPerson(){
            echo $this->firstname." ".$this->surname." ".$this->age;
        }
    }

    class Racer extends Person{
        private $startTime;
        private $cilTime;

        public function __construct($fn,$sn,$ag,$st,$ct){
            parent::__construct($fn,$sn,$ag);
            $this->startTime = $st;
            $this->cilTime = $ct;
        }

        public function getStartTime(){
            return $this->startTime;
        }

        public function getCilTime(){
            return $this->cilTime;
        }

        public function setStartTime($st){
            if ($st > 0) {
                $this->startTime = $st;
            }
        }

        public function setCilTime($ct){
            if ($ct > 0) {
                $this -> cilTime = $ct;
            }
        }

        public function getCategory(){
            if($this->age < 18){
                $category = "Junior";
            }
            elseif ($this->age >= 18 && $this->age < 40) {
                $category = "elite";
            }
            else {
                $category = "Veteran";
            }
            return $category;
        }

        public function getTime(){
            $this->startTime;
            return strtotime("1970-01-01 $this->cilTime UTC") - strtotime("1970-01-01 $this->startTime UTC");
        }
    }

    $racer1 = new Racer("Jan","Novák",32,"0:0:0","0:0:30");
    echo $racer1->getCategory();
    echo $racer1->getTime();
?>