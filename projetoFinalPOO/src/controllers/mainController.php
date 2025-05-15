<?php
    if($_GET):
        $controller = $_GET['arquivo'];
        $method = $_GET['metodo'];

        require_once "controllers/pageControllers/".$controller.".php";

        $obj = new $controller();
        $obj->$method();

    else:
        require_once "controllers/pageControllers/indexController.php";
        $obj = new IndexController();
        $obj->index();
    endif;
?>