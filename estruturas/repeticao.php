<?php
    $pessoas = [
        ['id'=> 1, 'nome'=> 'Alex'],
        ['id'=> 2, 'nome'=> 'Pris'],
        ['id'=> 3, 'nome'=> 'Caio'],
        ['id'=> 4, 'nome'=> 'Jonas']
    ];

    $pessoas2 = [
        ['id'=> "alfa", 'nome'=> 'Alex'],
        ['id'=> "beta", 'nome'=> 'Pris'],
        ['id'=> "gama", 'nome'=> 'Caio'],
        ['id'=> "omicron", 'nome'=> 'Jonas']
    ];
    
    for($i =0; $i<count($pessoas); $i++){
        echo "O cliente ".$pessoas[$i]['nome']. " possui o id ".$pessoas[$i]['id']."\n";
    }

    while($i <count($pessoas)){
        echo "(WHILE) O cliente ".$pessoas[$i]['nome']. " possui o id ".$pessoas[$i]['id']."\n";
        $i++;
    }

    foreach($pessoas as $chave => $valor){
        echo "(FOREACH) O cliente ".$valor['nome']. " possui o id ".$chave."\n";
    }

    foreach($pessoas2 as $chave => $valor){
        echo "(FOREACH) O cliente ".$valor['nome']. " possui o id ".$chave."\n";
        echo "(FOREACH) O cliente ".$valor['nome']. " possui o id ".$valor['id']."\n";
    }
    echo "Fim do programa!";
?>