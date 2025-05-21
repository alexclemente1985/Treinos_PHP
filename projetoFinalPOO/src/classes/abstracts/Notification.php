<?php
require_once "interfaces/PagamentoInterface.php";

abstract class Notification{
    
    public function showMessage(string $msg, string $arquivo = "", string $metodo = "", bool $erro = false){
        require "public/components/notificationComponent.php";
    }
}
?>