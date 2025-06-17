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
            $resultado= $this->inserir($_POST);
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

    function atualizar($dados) {}
    }
?>