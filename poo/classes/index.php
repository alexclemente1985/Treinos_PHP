<?php
    require_once "Pessoa.php";
    require_once "Cliente.php";
    require_once "Pedido.php";

    $p = new Pessoa("Alex", 39);

    /*
    $p->nome = "Teste";
    $p->idade = 39;
    */
    echo $p->nome. " tem ".$p->idade." de idade \n";
    echo $p->apresentar();
    var_dump($p);

    $c = new Cliente("Alex", "alex@email.com");
    $c2 = new Cliente("Pri", "pri@email.com");

    $pedido = new Pedido(123456, 450.99, $c);

    $pedido->apresentarPedido();


?>