<?php
require_once "Pessoa.php";

$p = new Pessoa("Fulano",97);
echo $p->apresentarPessoa();
echo $p->exibirNomeClasse();
echo $p->exibirPropriedadeClasse();
echo $p->exibirTipoPropriedade();
?>