<?php
#require_once "interfaces/PagamentoInterface.php";
require_once "classes/abstracts/Notification.php";

class CartaoCredito extends Notification{
    public function pagar(float $value)
    {
        echo "Pagamento no valor de {$value} realizado via Cartao de Crédito.";
    }
}
?>