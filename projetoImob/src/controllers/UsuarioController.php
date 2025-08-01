<?php
require_once "configurations/Formatter.php";
require_once "models/DAO/UsuarioDAO.php";
require_once "models/DAO/PerfilDAO.php";
require_once "services/UsuarioService.php";
require_once "services/FileUploadService.php";
require_once "models/abstracts/Notification.php";
class UsuarioController extends Notification
{
    private $usuarioService;
    private $usuarioDAO;
    private $perfil;
    private $fileUploadService;

    public function __construct()
    {
        $this->perfil = new PerfilDAO();
        $this->usuarioDAO = new UsuarioDAO();
        $this->usuarioService = new UsuarioService($this->usuarioDAO);
        $this->fileUploadService = new FileUploadService('lib/img/users-images');
    }
    function index()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $usuarios = $this->usuarioDAO->listarPorId($id);
        }
        if ($_POST) {
            if (empty($_POST['id'])) {
                $resultado = $this->inserir($_POST, $_FILES);
            } else {
                $resultado = $this->atualizar($_POST, $_FILES);
            }
        }
        $perfil = $this->perfil->listarTodos();
        require_once "views/painel/index.php";
    }
    public function inserir($dados, $file)
    {
        $imagem = $this->fileUploadService->upload($file['imagem']);
        $retorno = $this->usuarioService->cadastrarUsuario($dados, $imagem);
        if ($retorno) {
            $this->showMessage("Dados inseridos com sucesso!", "UsuarioController", "listar");
        }
    }
    function listar()
    {
        $formatter = new Formatter();
        $usuarios = $this->usuarioDAO->listarTodos();
        require_once "views/painel/index.php";
    }

    function atualizar($dados, $file)
    {
        if (array_search('imagem', $file)) {
            $imagem = $this->fileUploadService->upload($file['imagem']);
            $retorno = $this->usuarioService->atualizarUsuario($dados, $imagem);
        } else {
            $retorno = $this->usuarioService->atualizarUsuario($dados);
        }

        if ($retorno) {
            $this->showMessage("Dados atualizados com sucesso!", "UsuarioController", "listar");
        }
    }
    function deletar()
    {
        require_once "views/painel/index.php";
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->showMessage(
                "Deseja excluir o usuário de ID {$id}?",
                "UsuarioController",
                "confirmarDeletar",
                $id
            );
        } else {
            $this->showMessage("ID de usuário não informado...", "UsuarioController", "listar");
        }
    }

    function confirmarDeletar()
    {
        require_once "views/painel/index.php";

        $id = $_GET['id'] ?? null;
        $rowCount = $this->usuarioDAO->excluir($id);

        if ($rowCount > 0) {
            $this->showMessage("Usuário de ID {$id} excluído com sucesso!", "UsuarioController", "listar");
        } else {
            $this->showMessage("Falha na exclusão do usuário de ID {$id}...", "UsuarioController", "listar");
        }
    }
    function alterarStatus()
    {
        if ($_POST) {
            $this->atualizar($_POST, $_FILES);
        }
    }

    public function autenticar()
    {
        require_once "views/painel/usuario/autenticar.php";

        #REQUEST METHOD permite pegar um post após um direcionamento via get
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $senha = $_POST['senha'] ?? '';

            if($this->usuarioService->autenticarUsuario($usuario,$senha)){
                header('location:index.php?controller=PainelController&method=index');
            }
            

            // $dadosUsuario = $this->usuarioDAO->autenticar($usuario);

            // if(!empty($dadosUsuario) && password_verify($senha, $dadosUsuario[0]->SENHA)){
            //     $this->gerarSessao($dadosUsuario);
            //     header('location:index.php?controller=PainelController&method=index');
            // }
            else{
                $this->showMessage(
                    'Usuario ou senha incorreto!',
                    'UsuarioController',
                    'autenticar',
                    '',
                    false,
                    true
                );
            }
        }
    }
    // public function gerarSessao($usuario){
    //     $_SESSION['id'] = $usuario[0]->ID;
    //     $_SESSION['nome'] = $usuario[0]->NOME;
    //     $_SESSION['imagem'] = $usuario[0]->IMAGEM;
    // }

    public function logout(){
        // $_SESSION = [];
        // session_destroy();
        if($this->usuarioService->logoutUsuario()){
            header('location:index.php');
        }
        
    }
    }
?>