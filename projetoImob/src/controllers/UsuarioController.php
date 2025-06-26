<?php
require_once "models/DAO/UsuarioDAO.php";
require_once "models/DAO/PerfilDAO.php";
require_once "services/UsuarioService.php";
require_once "models/abstracts/Notification.php";
class UsuarioController extends Notification
{
    private $usuarioService;
    private $usuarioDAO;
    private $perfil;

    public function __construct()
    {
        $this->perfil = new PerfilDAO();
        $this->usuarioDAO = new UsuarioDAO();
        $this->usuarioService = new UsuarioService($this->usuarioDAO);
    }
    function index()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $usuarios = $this->usuarioDAO->listarPorId($id);
        }
        if ($_POST) {
            if (empty($_POST['id'])) {
                $resultado = $this->inserir($_POST);
            } else {
                $resultado = $this->atualizar($_POST);
            }
        }
        require_once "views/painel/index.php";
    }
    public function inserir($dados)
    {
        $retorno = $this->usuarioService->cadastrarUsuario($dados);
        if ($retorno) {
            $this->showMessage("Dados inseridos com sucesso!", "UsuarioController", "listar");
        }
    }
    function listar()
    {
        $usuarios = $this->usuarioDAO->listarTodos();
        require_once "views/painel/index.php";
    }

    function atualizar($dados)
    {
        $retorno = $this->usuarioService->atualizarUsuario($dados);
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
            $this->atualizar($_POST);
        }
    }
    }
?>