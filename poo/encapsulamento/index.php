<?php
require_once "Carro.php";

$c = new Carro("Civic", "Honda", 2022);
#echo $c->marca." \n";
#echo $c->modelo." \n";
#echo $c->ano." \n";

$c->ExibirDetalhesCarro();

echo $c->getMarca()." \n";
echo $c->getModelo()." \n";
echo $c->getAno()." \n";

$c->setAno(2023);
$c->setModelo("Fit");
$c->ExibirDetalhesCarro();
?>