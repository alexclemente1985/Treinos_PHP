<?php
function getLink(string $controller, string $method)
{

    if (strlen($controller) > 0 && strlen($method) > 0) {
        return "index.php?controller={$controller}&method={$method}";
    }
    return "index.php";
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
?>

<div class="aviso">
    <div class="msg bg-branco">

        <h2 class="fonte12 poppins-black<?= errorHandler($error); ?>"><?= msgHandler($msg, $error) ?></h2>
        <a href=<?= getLink($controller, $method) ?> class="btn-msg">Fechar</a>

    </div>
</div>