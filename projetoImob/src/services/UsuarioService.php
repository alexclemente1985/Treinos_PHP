<?php
    class UsuarioService{
        private $usuarioDAO;
    private $usuario;

    public function __construct(UsuarioDAO $usuarioDAO)
    {
        session_start();
        $this->usuarioDAO = $usuarioDAO;
    }

    public function cadastrarUsuario($dados, $imagem)
    {
        $this->usuario = new Usuario();
        $dados['imagem'] = $imagem;
        $dados['datacadastro'] = date('Y-m-d H:i:s', time());
        
        foreach($dados as $key=>$value){
            if($key == 'senha'){
                $value = password_hash($value, PASSWORD_BCRYPT);
            }
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

    public function autenticarUsuario($nome, $senha){
        $dadosUsuario = $this->usuarioDAO->autenticar($nome);
        
        //if(!empty($dadosUsuario) && password_verify($senha, $dadosUsuario[0]->SENHA)){
        if(!empty($dadosUsuario)){    
            $this->gerarSessaoUsuario($dadosUsuario);
            return true;
            //header('location:index.php?controller=PainelController&method=index');
        }
        return false;
    }
    public function gerarSessaoUsuario($usuario){
        $_SESSION['id'] = $usuario[0]->ID;
        $_SESSION['nome'] = $usuario[0]->NOME;
        $_SESSION['imagem'] = $usuario[0]->IMAGEM;
    }

    public function logoutUsuario(){
        $_SESSION = [];
        session_destroy();
        return true;
    }
    }
?>