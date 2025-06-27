<?php
    class UsuarioService{
        private $usuarioDAO;
    private $usuario;

    public function __construct(UsuarioDAO $usuarioDAO)
    {
        $this->usuarioDAO = $usuarioDAO;
    }

    public function cadastrarUsuario($dados, $imagem)
    {
        $this->usuario = new Usuario();
        $dados['imagem'] = $imagem;
        $dados['datacadastro'] = date('Y-m-d H:i:s', time());

        foreach($dados as $key=>$value){
           $this->usuario->$key = $value;
        }

        return $this->usuarioDAO->adicionar($this->usuario);
    }

    public function atualizarUsuario($dados, $imagem = '')
    {
        $this->usuario = new Usuario();
        if (strlen($imagem) > 0) {
            $dados['imagem'] = $imagem;
        }


        foreach ($dados as $key => $value) {
            if ($key == 'senha') {
                #criptografia da senha
                $value = password_hash($value, PASSWORD_BCRYPT);
            }
            $this->usuario->$key = $value;
        }

        return $this->usuarioDAO->atualizarUsuario($this->usuario);
    }
    }
?>