<?php
    function imprimirMsg(){
        echo "Hellow World!\n";
    }

    imprimirMsg();

    #Função com parâmetros
    function imprimirMsgParam($msg){
        echo "$msg \n";
    }

    imprimirMsgParam("Teste de função parametrizada...");

    #Função com retorno

    function soma(int $num1, int $num2){
        return $num1 + $num2;
    }

    $msg = "A soma de 2 com 3 é ".soma(2,3);

    imprimirMsgParam($msg);
?>