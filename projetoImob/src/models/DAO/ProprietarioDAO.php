<?php
require_once "models/Proprietario.php";
require_once "models/Conexao.php";


class ProprietarioDAO extends Conexao{
    public function adicionar(Proprietario $proprietario){
        $atributos = array_keys($proprietario->atributosPreenchidos());
        $valores = array_values($proprietario->atributosPreenchidos());

        return $this->inserir('PROPRIETARIO',$atributos,$valores);
    }

    public function listarTodos()
    {
        return $this->listar('PROPRIETARIO');
    }

    public function obterPorId($id) {}
}
?>