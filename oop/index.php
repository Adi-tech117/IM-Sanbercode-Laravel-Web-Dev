<?php
require_once("animal.php");
require_once("Frog.php");
require_once("Ape.php");

$sheep = new animal("shaun");

echo "Name : " . $sheep->hewan . "<br>";
echo "legs : " . $sheep->legs . "<br>";
echo "cold blooded : " . $sheep->cold_blooded . "<br>";


echo "----------------------<br>";

$kodok =  new Frog("buduk");

echo "Name : " . $kodok->hewan . "<br>";
echo "legs : " . $kodok->legs . "<br>";
echo "cold blooded : " . $kodok->cold_blooded . "<br>";
echo "Jump :" . $kodok ->jump();

echo "----------------------<br>";

$sungokong = new Ape("kera sakti");

echo "Name : " . $sungokong->hewan . "<br>";
echo "legs : " . $sungokong->legs . "<br>";
echo "cold blooded : " . $sungokong->cold_blooded . "<br>";
echo "Yell :" . $sungokong->yell();

?>