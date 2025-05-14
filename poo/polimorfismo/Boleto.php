<?php
require_once "Pagamento.php";

class Boleto implements Pagamento{
    public function pagar(float $valor): void
    {
        echo "Pagamento no valor ".number_format($valor,2)." gerado via boleto\n";
    }
}
?>