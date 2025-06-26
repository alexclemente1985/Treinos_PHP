<?php
require_once "models/DAO/ProprietarioDAO.php";
require_once "services/ProprietarioService.php";
require_once "models/abstracts/Notification.php";

class ProprietarioController extends Notification
{
    #injeção de dependências no construtor
    private $proprietarioService;
    private $proprietarioDAO;

    public function __construct()
    {
        $this->proprietarioDAO = new ProprietarioDAO();
        $this->proprietarioService = new ProprietarioService($this->proprietarioDAO);
    }
    function index()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $proprietarios = $this->proprietarioDAO->listarPorId($id);
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
        $retorno = $this->proprietarioService->cadastrarProprietario($dados);
        if($retorno){
            $this->showMessage("Dados inseridos com sucesso!", "ProprietarioController","listar");
        }
    }
    function listar()
    {
        $proprietarios = $this->proprietarioDAO->listarTodos();
        require_once "views/painel/index.php";
    }

    function atualizar($dados)
    {
        $retorno = $this->proprietarioService->atualizarProprietario($dados);
        if($retorno){
            $this->showMessage("Dados atualizados com sucesso!", "ProprietarioController","listar");
        }
    }
    function deletar()
    {
        require_once "views/painel/index.php";
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->showMessage(
                "Deseja excluir o proprietário de ID {$id}?",
                "ProprietarioController",
                "confirmarDeletar",
                $id
             );
            } else {
            $this->showMessage("ID de usuário não informado...", "ProprietarioController", "listar");
        }
    }

    function confirmarDeletar()
    {
        require_once "views/painel/index.php";

        $id = $_GET['id'] ?? null;
        $rowCount = $this->proprietarioDAO->excluir($id);

        if ($rowCount > 0) {
            $this->showMessage("Proprietário de ID {$id} excluído com sucesso!", "ProprietarioController", "listar");
        } else {
            $this->showMessage("Falha na exclusão do proprietário de ID {$id}...", "ProprietarioController", "listar");
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