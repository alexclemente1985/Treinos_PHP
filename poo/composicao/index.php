<?php
require_once "Motor.php";
require_once "Carro.php";


$c = new Carro("Fusca", 1500);

$c->exibirDetalhesCarro();

$c1 = new Carro("Camaro", 2000);
$c1->exibirDetalhesCarro();
?>