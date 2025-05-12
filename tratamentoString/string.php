<?php
    $string1 = " Eu sou uma string    ";
    $string2 = "EU SOU UMA STRING";
    $string3 = "EU SOU UMA STRING     ";
    $string = "                          EU SOU UMA STRING     ";
    $codigo = "2";

    #TRIM
    $trim = trim($string);
    $ltrim = ltrim($string);
    $rtrim = rtrim($string);
    echo $string."\n";
    echo $trim."\n";
    echo $ltrim."\n";
    echo $rtrim."\n";

    #STRLEN - quantidade de caracteres de string
    $len = strlen($string3);
    echo $len."\n";

    #SUBSTR - mostrar determinado número de caracteres
    $substr = substr($string3,4,9);
    echo $substr."\n";

    #STRTOLOWER - converte uma string em tudo minúsculo
    $lower = strtolower($string3);
    echo "$lower \n";

    #STRTOUPPER
    $up = strtoupper($string3);
    echo "$up \n";

    #UCFIRST - capitalização
    $cap = ucfirst(strtolower($string3));
    echo "$cap \n";

    #UCWORDS - capitaliza cada palavra da string
    $cap2 = ucwords(strtolower($string3));
    echo "$cap2 \n";

    #Funções pós php8
    $nome = "Odete Roitman Spacat";

    ##str_contains
    echo "Método str_contains\n";
    var_dump(str_contains($nome, 'Roitman'));
    ##str_start_with
    echo "Método str_start_with\n";
    var_dump(str_starts_with($nome, 'Roitman'));
    ##str_ends_with
    echo "Método str_end_with\n";
    var_dump(str_ends_with($nome, 'Roitman'));

    #STR_PAD
    $padLeft = str_pad($codigo, 6,'-', STR_PAD_LEFT);
    $padRight = str_pad($codigo, 6,'0', STR_PAD_RIGHT);
    echo "Valor original: $codigo \n";
    echo "Valor com inserção a esquerda $padLeft \n";
    echo "Valor com inserção a direita $padRight \n";
?>