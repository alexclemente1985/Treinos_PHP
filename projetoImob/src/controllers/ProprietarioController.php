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
        return $retorno;
        #echo $this->showMessage("Dados inseridos com sucesso!");
    }
    function listar()
    {
        $proprietarios = $this->proprietarioDAO->listarTodos();
        require_once "views/painel/index.php";
    }

    function atualizar($dados)
    {
        $retorno = $this->proprietarioService->atualizarProprietario($dados);
        return $retorno;
    }
    function deletar()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $escolha = $this->showMessage("Deseja excluir o proprietário", "ProprietarioController", "listar");

            if ($escolha) {
                $this->excluirProprietario($id);
            } else {
                require_once "views/painel/index.php";
            }
        } else {
            $this->showMessage("ID de usuário não informado...", "ProprietarioController", "listar");
        }
    }

    function excluirProprietario($id)
    {

        $rowCount = $this->proprietarioDAO->excluir($id);

        if ($rowCount > 0) {
            $this->showMessage("Proprietário de ID {$id} excluído com sucesso!");
        } else {
            $this->showMessage("Falha na exclusão do proprietário de ID {$id}...", "ProprietarioController", "listar");
        }
    }
    }
?>