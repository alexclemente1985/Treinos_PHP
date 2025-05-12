<?php
    function lerCsv($nomeArquivo){
        if(file_exists($nomeArquivo)):
            echo "Arquivo encontrado e pronto para leitura...";
            $arquivo =fopen($nomeArquivo, "r");
            while(($line = fgetcsv($arquivo, 0, ";")) !== FALSE){ // parâmetro 0 faz com que php ajuste o tamanho de linha
                $users[] = $line;
            }
            fclose($arquivo);
        else:
            echo "Arquivo não encontrado, verifique o caminho digitado...";
        endif;

        return $users;
    }

    $nomeArquivo = "users.csv";

    $users = lerCsv($nomeArquivo);

    if(count($users)>0):
        echo "Dados encontrados... \n";
        foreach($users as $user){
            echo implode(' | ', $user) ."\n";
        }
    else:
        echo "Não encontramos dados nenhum... \n";
    endif;
?>