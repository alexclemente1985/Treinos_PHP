<?php
require_once "models/Usuario.php";
require_once "models/Conexao.php";

    class UsuarioDAO extends Conexao{
        public function adicionar(Usuario $usuario){
        $atributos = array_keys($usuario->atributosPreenchidos());
        $valores = array_values($usuario->atributosPreenchidos());

        return $this->inserir('USUARIO',$atributos,$valores);
    }

    public function listarTodos()
    {
        return $this->listar('USUARIO');
    }

    public function listarPorId($id) {
        return $this->listar('USUARIO','WHERE ID = ?', [$id]);
    }

    public function atualizarUsuario(Usuario $usuario)
    {
        $atributos = array_keys($usuario->atributosPreenchidos());
        $valores = array_values($usuario->atributosPreenchidos());

        return $this->atualizar('USUARIO', $atributos, $valores, $usuario->getId());
    }

    public function excluir($id)
    {
        return $this->deletar('USUARIO', $id);
    }

    public function autenticar($usuario){
        return $this->listar('USUARIO',"WHERE USUARIO = '".$usuario."'");
    }
    }
?>