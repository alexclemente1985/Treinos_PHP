<?php
require_once "ContaFisica.php";
require_once "ContaJuridica.php";

$cf = new ContaFisica("000.000.000-00", "Fulano", "0001234", "0021", 4854.57);
$cj = new ContaJuridica("00.000.000/0001-00", "Fulano LTDA.", "0004321", "0141", 48504.57);

$cf->consultarSaldo();
$cf->sacar(345.57);
$cf->consultarSaldo();
$cj->consultarSaldo();
$cj->sacar(1345.57);
$cj->consultarSaldo();
$cf->depositar(1678.38);
$cf->consultarSaldo();
$cj->depositar(10000.89);
$cj->consultarSaldo();
?>