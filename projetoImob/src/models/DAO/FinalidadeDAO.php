<?php
require_once "models/Finalidade.php";
require_once "models/Conexao.php";
class FinalidadeDAO extends Conexao{
    public function listarTodos(){
        return $this->listar('FINALIDADE');
    }
}
?>