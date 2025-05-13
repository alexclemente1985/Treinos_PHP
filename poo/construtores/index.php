<?php
    require_once "Produto.php";
    require_once "Tv.php";

    $p = new Produto("Teclado", 120.00);
    #$p->setDescricao("Teclado");
    #$p->setPreco(120.00);

    $p->apresentarProduto();
    var_dump($p);

    $tv = new Tv("Thb-29", 29, "Toshiba");
    $tv->apresentar();
?>