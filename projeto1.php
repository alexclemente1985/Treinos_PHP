<?php
    echo "Escreva o seu nome.. \n";
    $nome = readline(); //registro de dados via cmd
    echo "O nome digitado foi $nome \n";

    echo "Informe a sua idade.. \n";
    $idade = intval(readline()); //converte o valor em inteiro

    echo "O nome digitado foi $nome \n";
    echo "A idade digitada foi $idade \n";

    echo "O tipo da variável $idade é ".getType($idade).".\n";

    echo "Informe sua profissão..";
    $profissao = readline();

    echo "Olá, $nome é $profissao e tem $idade de idade. \n" ;
?>