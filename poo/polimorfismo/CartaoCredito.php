<?php
require_once "Pagamento.php";

class CartaoCredito implements Pagamento{
    public function pagar(float $valor): void
    {
        echo "Pagamento no valor ".number_format($valor,2)." realizado via cartão de crédito\n";
    }
}
?>