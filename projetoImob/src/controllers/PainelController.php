<?php
    class PainelController{
       
        function index(){
            if($_GET){
                $controller = strtolower(str_replace("Controller","",$_GET['controller']));
                $method = strtolower($_GET['method']);

                if ($controller == 'painel' && $method == 'index'){
                    require_once "Views/painel/index.php";
                }
                else{
                    require_once "Views/".$controller."/".$method.".php";
                }
            }

            
        }
    }
?>