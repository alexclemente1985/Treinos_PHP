<?php
require_once "controllers/BaseController.php";

session_start();

if ($_GET) {
        $controller = $_GET['controller'];
        $method = $_GET['method'];

    require_once "controllers/" . $controller . ".php";

        $obj = new $controller();

        $obj->$method();
    }
    else{
        $start = new BaseController();
        $start->index();
    }
?>