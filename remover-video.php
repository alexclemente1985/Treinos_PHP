<?php
    $dbPath = __DIR__.'/banco.sqlite';
    $pdo = new PDO("sqlite:$dbPath");

    $id = $_GET['id'];
    
   

    $repository = new \Alura\Mvc\Repository\VideoRepository($pdo);
    $repoReturn = $repository->remove($id);

    if ($repoReturn === false){
        header('Location: /?sucesso=0');
    } else {
        header('Location: /?sucesso=1');
    }
?>