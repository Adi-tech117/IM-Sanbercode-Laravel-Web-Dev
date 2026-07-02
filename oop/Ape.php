<?php
require_once("animal.php");


class Ape extends animal{
    public $legs = 2;

    public function yell(){
        return " Auooo <br>";

   }

} 

?>