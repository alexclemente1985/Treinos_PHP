<?php
require_once "Carro.php";
require_once "Moto.php";

$m = new Moto("Honda", "Adv 150", "2024");
$c = new Carro("Toyota", "Corolla", "2018");

$m->acelerar();
$m->frear();

$c->acelerar();
$c->frear();
?>