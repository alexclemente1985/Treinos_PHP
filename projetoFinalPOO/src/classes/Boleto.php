<?php
#require_once "interfaces/PagamentoInterface.php";
require_once "classes/abstracts/Notification.php";

class Boleto extends Notification{

    public function pagar(float $value)
    {
        $msg = "Pagamento no valor de R$ ".number_format($value, 2, ',','.')." realizado via boleto.";
        return $this->showMessage($msg);
    }

    public function getPaymentType(): string{
        return "Boleto";
    }

    public function getClassName(){
        return static::class;
    }
}
?>