<?php
if (isset($controller)) {
    $controller = strtolower($_GET['controller']);
}
if (isset($method)) {
    $method = strtolower($_GET['method']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Casa web - imobiliária online</title>
        <script src="lib/js/jquery-3.7.1.min.js" type="text/javascript"></script>
        <?php if (isset($controller) && ($controller == "base") && isset($method) && ($method == 'index')): ?>
            <script src="lib/js/animations.js" type="module"></script>
        <?php endif;?>
        <script src="lib/js/ajax.js" type="text/javascript"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header class="header bg-preto-azulado-escuro hg-80 wd-100 pd-t-2">
            <div class="container">
                <div class="box-6 flex justify-start item-centro">
                    <a href="index.php">
                        <h1 class="fonte36 fnc-branco fw-bold roboto-condensed">CasaWeb <span class="font22 fw-300"> - Imobiliária</span></h1>
                    </a>
                    <i class="fa-brands fa-facebook-f  fonte22 fnc-branco mg-r-3 mg-l-3"></i>
                    <i class="fa-brands fa-linkedin-in fonte22 fnc-branco mg-r-3"></i>
                    <i class="fa-brands fa-youtube     fonte22 fnc-branco mg-r-3"></i>
                </div>
                <div class="box-6">
                    <nav class="wd-100 mg-t-1">
                        <ul class="flex justify-end">
                            <li class="mg-l-3"><a href="#inicio" class="fnc-branco fnc-vermelho-hover espaco-letra fonte16">Início</a></li>
                            <li class="mg-l-3"><a href="#comprar" class="fnc-branco fnc-vermelho-hover espaco-letra fonte16">Comprar</a></li>
                            <li class="mg-l-3"><a href="#alugar" class="fnc-branco fnc-vermelho-hover espaco-letra fonte16">Alugar</a></li>
                            <li class="mg-l-3"><a href="#depoimentos" class="fnc-branco fnc-vermelho-hover espaco-letra fonte16">Depoimentos</a></li>
                            <li class="mg-l-3"><a href="#contato" class="fnc-branco fnc-vermelho-hover espaco-letra fonte16">Contato</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="limpar"></div>
            <div class="barra bg-vermelho"></div>
        </header>
        <div class="limpar"></div>
        <div class="esconde"></div>
    </body>
</html>