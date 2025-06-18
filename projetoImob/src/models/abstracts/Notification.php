<?php

abstract class Notification{

    public function showMessage(string $msg, string $controller = "", string $method = "", bool $error = false)
    {
        require "public/components/notificationComponent.php";
    }
}
?>