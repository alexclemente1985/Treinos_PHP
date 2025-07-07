<?php
require_once "models/Finalidade.php";
require_once "models/Conexao.php";
class TipoImovelDAO extends Conexao{
    public function listarTodos(){
        return $this->listar('TIPOIMOVEL');
    }
}
?>