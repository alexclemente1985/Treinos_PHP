<?php
require_once "Boleto.php";
require_once "CartaoCredito.php";
require_once "PayPal.php";


$b = new Boleto();
$p = new PayPal();
$c = new CartaoCredito();

/*
$b->pagar(35.98);
$p->pagar(544.76);
$c->pagar(22,76);
*/

processarPagamento($b, 35.98);
processarPagamento($p, 544.768);
processarPagamento($c, 22.76);

function processarPagamento(Pagamento $formaPagamento, $valor): void{
     $formaPagamento->pagar($valor);
}
?>