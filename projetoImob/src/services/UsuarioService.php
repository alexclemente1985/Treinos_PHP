<?php
    class UsuarioService{
        private $usuarioDAO;
    private $usuario;

    public function __construct(UsuarioDAO $usuarioDAO)
    {
        $this->usuarioDAO = $usuarioDAO;
    }

    public function cadastrarUsuario($dados){
        $this->usuario = new Usuario();

        foreach($dados as $key=>$value){
           $this->usuario->$key = $value;
        }

        return $this->usuarioDAO->adicionar($this->usuario);
    }

    public function atualizarUsuario($dados)
    {
        $this->usuario = new Usuario();

        foreach ($dados as $key => $value) {
            $this->usuario->$key = $value;
        }

        return $this->usuarioDAO->atualizarUsuario($this->usuario);
    }
    }
?>