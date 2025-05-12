<?php
    function gerarArquivoCsv($nomeArquivo, $users)
    {
        if(count($users) > 0):
            echo "Array com dados a serem inseridos";
            $escreverCsv = fopen($nomeArquivo, 'w');
            foreach($users as $dados){
                fputcsv($escreverCsv, $dados, ";");
            }
            fclose($escreverCsv);
        else:
            echo "Náo há dados";
        endif;
    }

    $users = [
        ["Nome", "Idade", "E-mail"],
        ["João", "34", "joao@gmail.com"],
        ["Maria", "24", "maria@gmail.com"],
        ["Pedro", "45", "pedro@yahoo.com"],
        ["Tiago", "36", "tiago@gmail.com"]
    ];

    $nomeArquivo = "users.csv";
    gerarArquivoCsv($nomeArquivo, $users);

?>