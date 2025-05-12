<?php
    #Comparação

    $a = "a";
    $b = "a";
    $c = 3;
    $d = "3";

    //Igualdade
    $igual = $a == $b;
    var_dump($igual);

    //Identidade
    $igual = $c == $d;
    var_dump($igual);

    $ident = $c === $d;
    var_dump($ident);

    //Diferente
    $diff = $a != $b;
    var_dump($diff);
    
    $diff = $c != $d;
    var_dump($diff);

    $diff = $c !== $d;
    var_dump($diff);

    //Maior e menor que
    $e = 30;
    $diff = $c < $e;
    var_dump($diff);

    $diff = $c > $e;
    var_dump($diff);

    $diff = $c <= $d;
    var_dump($diff);


?>