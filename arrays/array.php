<?php
    $num = [1,2,3,4,5,6,7];

    #arrays associativos
    $frutas = [
            "A" => "Banana",
            "B" => "Abacaxi",
            "C" => "Maçã",
            "D" => "Uva"
    ];

    # Impressão de arrays
    print_r($num);
    print_R($frutas);
    echo "$frutas[C]\n";

    # Contagem de itens de um array
    echo count($num)."\n";

    # Inserindo valores no array no final do array (arrays não associativos)
    $num[] = 6;
    print_r($num);

    # Reordenando valores do array
    sort($num);
    print_r($num);

    # Ordenação decrescente
    rsort($num);
    print_r($num);

    # Inserção de valores com array_push
    array_push($num,5, 6, 8, 10);
    sort($num);
    print_r($num);

    # Unset - remoção de elementos do array
    unset($num[7], $num[4]);
    print_r($num);

    # Inserção em arrays associativos
    array_push($frutas, "Goiaba", "Melancia");

    $frutas["E"] = "Caju";
    $frutas["F"] = "Cereja";
    print_r($frutas);
?>