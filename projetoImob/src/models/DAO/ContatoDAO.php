<?php
require_once "models/Conexao.php";
require_once "models/Contato.php";

class ContatoDAO extends Conexao{
    public function adicionar(Contato $contato){
        $atributos = array_keys($contato->atributosPreenchidos());
        $valores = array_values($contato->atributosPreenchidos());

        return $this->inserir('CONTATO',$atributos,$valores);
    }

    public function listarTodos(){
        return $this->listar("CONTATO", "WHERE ATIVO = 1");
    }

    public function atualizarContato(Contato $contato)
    {
        $atributos = array_keys($contato->atributosPreenchidos());
        $valores = array_values($contato->atributosPreenchidos());

        return $this->atualizar("CONTATO", $atributos, $valores, $contato->getId());
    }
}
?>