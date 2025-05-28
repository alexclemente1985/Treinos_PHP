<?php
#require_once "interfaces/PagamentoInterface.php";
require_once "classes/abstracts/Notification.php";

class CartaoCredito extends Notification{
    public function pagar(float $value)
    {
        $msg = "Pagamento no valor de R$ ".number_format($value, 2, ',','.')."  realizado via Cartao de Crédito.";
        return $this->showMessage($msg);
    }

    public function getPaymentType(): string{
        return "Cartão de Crédito";
    }

    public function getClassName(){
        return static::class;
    }
}
?>