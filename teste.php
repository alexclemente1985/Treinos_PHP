<?php
//comentário tipo 1
    echo 'Teste php';
    #Variável declarada
    $nome = 'Alexandre'; // string
    echo '<hr>';
    #variável recuperada
    echo $nome;

?>
<hr>
<?php 
    #Comentário em linha
    echo 'Mensagem Echo <br>';

    $salario = 840.00; // float
    $idade = 40; // int
    $ativo = true; // bool

    /*
        Comentário multilinhas
    */

    #Constantes
    define("NOME", "Jake"); //modo 1

    echo NOME . "<br>";

    const IDADE = 15; //modo 2
    echo IDADE . "<br>";



    //Constantes mágicas
    echo "A linha atual é a ". __LINE__ . "<br>"; //constante que representa a linha atual no código
    echo "O caminho do arquivo atual é ". __FILE__ . "<br>"; //constante que representa o caminho do diretório atual do arquivo
    echo "O diretório atual é ". __DIR__ . "<br>";
?>
<hr>
<?='Echo Resumido'?>
<hr>
<?php
    echo $salario;
    echo '<br>';

    //Concatenação
    echo $nome . ' tem ' . $idade . ' anos de idade e recebe R$'. $salario . ' por mês.';
?>