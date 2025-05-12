<?php
    require_once "Departamento.php";
    require_once "Funcionario.php";

    $funcionario = new Funcionario("Alexandre","Desenvolvedor");
    $funcionario2 = new Funcionario("Jonas","Analista");
    $funcionario3 = new Funcionario("Caio","Gerente de Projetos");

    $funcionarios = [];
    $funcionarios[] = $funcionario;
    $funcionarios[] = $funcionario2;
    $funcionarios[] = $funcionario3;

    $depto = new Departamento("Tecnologia de Informação");
    foreach($funcionarios as $f){
        $depto->adicionarFuncionario($f);
    }

    $depto->listarFuncionario();
    
?>