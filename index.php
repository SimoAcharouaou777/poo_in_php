<?php


class Android{
    public $ram;
    public $space;
    public $color;
    public $inches;
    public $ownername;
    private $pass;
    const OWNERNAME = 4;

    public function changeProp($ra,$spa,$col,$inch,$owner){
        $this->ram        = $ra;
        $this->space      = $spa;
        $this->color      = $col;
        $this->inches     = $inch;
        $this->ownername = $owner;
        
    }
    public function changepass($newpass){
        $this->pass = sha1($newpass) ;
    }
    public function checkowner(){
        if(strlen($this->ownername) < self::OWNERNAME){
            echo"the name must be more than ". self::OWNERNAME. "charachters";
        }else{
            echo"your name has been set";
        }
    }
}

$redmiNot7 = new Android();
$redmiNot7->changeProp("8GB" , "256GB", "GOLDEN" , "6inches" , "Mohamed");
$redmiNot7->checkowner();
$redmiNot8 = new Android();
$redmiNot8->changeProp("6GB" , "56GB", "SILVER" , "5inches" , "ABDELLALI");
$redmiNot8->checkowner();
$redmiNot8->changepass('simo@ach');


echo '<pre>';
var_dump($redmiNot7);
var_dump($redmiNot8);
echo '</pre>';

