<?php
#require_once "../interfaces/PagamentoInterface.php";
require_once "classes/abstracts/Notification.php";
class PayPal extends Notification{
    public function pagar(float $value)
    {
        $msg = "Pagamento no valor de R$ ".number_format($value, 2, ',','.')."  realizado via PayPal.";
        return $this->showMessage($msg);
    }

    public function getPaymentType(): string{
        return "PayPal";
    }

    public function getClassName(){
        return static::class;
    }
}
?>