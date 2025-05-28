<?php
    if($_GET):
        $controller = $_GET['arquivo'];
        $method = $_GET['metodo'];

        if(isset($_GET['parametro'])){
            $param = $_GET['parametro'];
            require_once "classes/".$controller.".php";
        }
        else{
            require_once "controllers/pageControllers/".$controller.".php";
        }        

        $obj = new $controller();
        if(isset($_GET['parametro']) && $_GET['parametro'] !== ''){
            #require_once "controllers/pageControllers/cartController.php";
            $obj->$method($param);
        }
        else{
            
            $obj->$method();
        }
    else:
        require_once "controllers/pageControllers/indexController.php";
        $obj = new IndexController();
        $obj->index();
    endif;
?>