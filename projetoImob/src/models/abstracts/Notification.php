<?php

abstract class Notification{

    public function showMessage(
        string $msg, 
        string $controller = "", 
        string $method = "",
        string $id = "",
        bool $cancelAction = false, 
        bool $error = false)
    {
        require "public/components/notificationComponent.php";

    }
}
?>