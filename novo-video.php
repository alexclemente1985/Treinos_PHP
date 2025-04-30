<?php
    $dbPath = __DIR__.'/banco.sqlite';
    $pdo = new PDO("sqlite:$dbPath");

    
    //Retorna false se a variável abaixo não verificar se é url
    $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
    if ($url === false){
        header('Location: /?sucesso=0');
        exit();
    }

    $titulo = filter_input(INPUT_POST, 'titulo');
    if ($titulo === false) {
        header('Location: /?sucesso=0');
        exit();
      }

    $repository = new \Alura\Mvc\Repository\VideoRepository($pdo);
    $repoReturn = $repository->add(new \Alura\Mvc\Entity\Video($url, $titulo));


    if ($repoReturn === false){
        header('Location: /?sucesso=0');
    } else {
        header('Location: /?sucesso=1');
    }
    

?>