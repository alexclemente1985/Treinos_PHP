<?php

function getLink(string $controller, string $method, string $id ="")
{
    if (strlen($controller) > 0 && strlen($method) > 0) {
        $link = "index.php?controller={$controller}&method={$method}";

        if(strlen($id)>0){
            return $link."&id={$id}";
        } else{
            return $link;
        }
    }
   
    #return "index.php";
}
function errorHandler(bool $error)
{
    if ($error) {
        return " fnc-error";
    }

    return " fnc-sucesso";
}

function msgHandler(string $msg, bool $error)
{
    if ($error) {
        return "Falha na operação.";
    }
    return $msg;
}

function goBack(){
    $referer = filter_var($_SERVER['HTTP_REFERER'],FILTER_VALIDATE_URL);
    if(!empty($referer)){
        return $referer;
    }
    return "javascript:history.go(-1)";
}


?>

<div class="aviso">
    <div class="msg bg-branco">
        <h2 class="fonte12 poppins-black<?= errorHandler($error); ?>"><?= msgHandler($msg, $error); ?></h2>
        <?php if(isset($id) && strlen($id) > 0):?>
            <div class="box-10 flex justify-center align-center">
                <a href="<?= getLink($controller, $method, $id);?>" class="btn-msg mg-r-1">Aceitar</a>
                <a href="<?= goBack();?>" class="btn-msg">Cancelar</a>
            </div>
            
        <?php else:?>
            <a href=<?= getLink($controller, $method) ?> class="btn-msg">Fechar</a>
        <?php endif;?>

    </div>
</div>