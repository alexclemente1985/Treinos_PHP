<?php
require_once "models/Perfil.php";
require_once "models/Conexao.php";
class PerfilDAO extends Conexao
{
    public function listarTodos()
    {
        return $this->listar('PERFIL');
    }
}
?>