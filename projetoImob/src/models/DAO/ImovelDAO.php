<?php

require_once "models/Imovel.php";
require_once "models/Conexao.php";
class ImovelDAO extends Conexao{
    public function adicionar(Imovel $imovel){
        $atributos = array_keys($imovel->atributosPreenchidos());
        $valores = array_values($imovel->atributosPreenchidos());

        return $this->inserir('IMOVEL',$atributos,$valores);
    }

    public function listarTodos()
    {
        return $this->listar('IMOVEL');
    }

    public function listarPorId($id) {
        return $this->listar('IMOVEL','WHERE ID = ?', [$id]);
    }

    public function atualizarImovel(Imovel $imovel)
    {
        $atributos = array_keys($imovel->atributosPreenchidos());
        $valores = array_values($imovel->atributosPreenchidos());

        return $this->atualizar('IMOVEL', $atributos, $valores, $imovel->getId());
    }

    public function excluir($id)
    {
        return $this->deletar('IMOVEL', $id);
    }
    
}
?>