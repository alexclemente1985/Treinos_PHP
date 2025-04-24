<?php
  require "src/conexao-bd.php";
  require "src/model/Produto.php";
  require "src/repositories/ProdutoRepositorio.php";

  $produtoRepositorio = new ProdutoRepositorio($pdo);
  //$produtoRepositorio->deletar($_GET['id']);
  $produtoRepositorio->deletar($_POST['id']);

  header('Location: admin.php');
?>