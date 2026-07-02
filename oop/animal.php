<?php

class animal {
    public $legs = 4;
    public $cold_blooded = "no";
    public $hewan;

    public function __construct ($name){
        $this-> hewan = $name;
    }
}

?>