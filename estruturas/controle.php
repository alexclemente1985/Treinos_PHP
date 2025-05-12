<?php
echo "Digite o nome do aluno:\n";
$nome = readline();
    # if else
    
    $nota1 = 7;
    $nota2 = 3;
    $media = ($nota1+$nota2)/2;

    $resultado = "";

    if ($media >=6 ){
        $resultado = "aprovado";        
    }
    elseif ($media < 6 && $media >= 5){
        $resultado = "recuperacao";        
    }
    else{
        $resultado = "reprovado";        
    }

    # switch
    switch($resultado){
        case "aprovado":
            echo "Aluno $nome aprovado!\n";
            break;
        case "recuperacao":
            echo "Aluno $nome está de recuperação: média $media\n";
            break;
        default:
            echo "Aluno $nome reprovado!\n";
            break;
    }

    # match
    $retornoMatch = match($resultado){
        "aprovado" =>  "Aluno $nome aprovado!\n",
        "recuperacao" =>  "Aluno $nome está de recuperação: média ". number_format($media,2)."\n",
        default => "Aluno $nome reprovado!\n"
    };

    echo $retornoMatch
?>