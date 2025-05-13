<?php
    require_once "Gerente.php";
    require_once "Operario.php";

    $g = new Gerente("Fulano", 5000, "Gerente de Projetos");
    $o = new Operario("Sicrano", 3000, "Desenvolvedor Jr.");

    echo $g->apresentarFuncionario();
    echo $o->apresentarFuncionario();

    echo $g->gerarBonus();
    echo $o->gerarBonus();


?>