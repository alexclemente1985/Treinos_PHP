<?php
require_once "Pagamento.php";

class PayPal implements Pagamento{
    public function pagar(float $valor): void
    {
        echo "Pagamento no valor ".number_format($valor,2)." realizado via PayPal\n";
    }
}
?>