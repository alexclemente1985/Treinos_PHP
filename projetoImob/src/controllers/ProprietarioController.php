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
            $proprietario = $this->proprietarioDAO->obterPorId($id);
        }
        if ($_POST) {
            $this->inserir($_POST);
        }
        require_once "views/painel/index.php";
    }
    public function inserir($dados)
    {
        $retorno = $this->proprietarioService->cadastrarProprietario($dados);
        echo $this->showMessage("Dados inseridos com sucesso!");
    }
    function listar()
    {
        $proprietarios = $this->proprietarioDAO->listarTodos();
        require_once "views/painel/index.php";
    }

    function atualizar($dados) {}
    }
?>