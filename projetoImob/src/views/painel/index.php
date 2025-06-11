<?php
    if($_GET){
        $controller = strtolower(str_replace("Controller","",$_GET['controller']));
        $method = strtolower($_GET['method']);
    }
?>
<section class="painel">
    <div class="container-100">
        <?php require_once "Views/painel/components/menu.php";?>
        <section class="carregamento">
            <div class="box-10 bg-branco pb-b-4">
                <?php require_once "Views/painel/components/painelHeader.php";?>
                <?php if(isset($controller) && isset($method)){
                    if($controller == 'painel' && $method == 'index'){
                        require_once "Views/painel/main/" . $method . ".php";
                    }
                    else{
                        require_once "Views/painel/".$controller."/".$method.".php";
                    }
                }?>
            </div>
        </section>
    </div>
</section>
