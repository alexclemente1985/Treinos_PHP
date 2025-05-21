<?php
function getLink(string $arquivo, string $metodo){
    if(strlen($arquivo) > 0 && strlen($metodo) > 0){
        return "index.php?arquivo={$arquivo}&metodo={$metodo}";
    }
    return "index.php";
    
}
function errorHandler(bool $error){
    if($error){
        return " fnc-error";
    }
    
    return " fnc-sucesso";
    
}

function msgHandler(string $msg, bool $error){
    if($error){
        return "Falha na operação.";
    }
    return $msg;
}
?>

<div class="aviso">
    <div class="msg bg-branco">
       
        <h2 class="fonte12 poppins-black<?=errorHandler($erro);?>"><?=msgHandler($msg, $erro)?></h2>
        <a href=<?=getLink($arquivo, $metodo)?> class="btn-msg">Fechar</a>
        
    </div>
</div>