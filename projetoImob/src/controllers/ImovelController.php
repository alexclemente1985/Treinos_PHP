<?php
require_once "configurations/Formatter.php";
require_once "models/Proprietario.php";
require_once "models/DAO/ImovelDAO.php";
require_once "models/DAO/TipoImovelDAO.php";
require_once "models/DAO/FinalidadeDAO.php";
require_once "models/DAO/ProprietarioDAO.php";
require_once "services/ImovelService.php";
require_once "models/abstracts/Notification.php";
require_once "services/FileUploadService.php";


class ImovelController extends Notification{
    private $imovelService;
    private $imovelDAO;
    private $tipoimovelDAO;
    private $finalidadeDAO;
    private $proprietarioDAO;
    private $fileUploadService;

    public function __construct()
    {
        $this->tipoimovelDAO = new TipoImovelDAO();
        $this->finalidadeDAO = new FinalidadeDAO();
        $this->proprietarioDAO = new ProprietarioDAO();
        $this->imovelDAO = new ImovelDAO();
        $this->imovelService = new ImovelService($this->imovelDAO);

        $this->fileUploadService = new FileUploadService('lib/img/upload');
    }
    function index()
    {

        $imoveis = null;
        $id = $_GET['id'] ?? null;
        if ($id) {
            $imoveis = $this->imovelDAO->listarPorId($id);
        }
        if ($_POST) {
            if (empty($_POST['id'])) {
                $this->inserir($_POST, $_FILES);
            } else {
                $this->atualizar($_POST, $_FILES);
            }
        }
        $tipoImovel = $this->tipoimovelDAO->listarTodos();
        $finalidade = $this->finalidadeDAO->listarTodos();
        $proprietario = $this->proprietarioDAO->listarTodos();

        require_once "views/painel/index.php";
    }
    public function inserir($dados, $file)
    {
        $imagem = $this->fileUploadService->upload($file['imagemcapa']);
        $retorno = $this->imovelService->cadastrarImovel($dados, $imagem);
        if ($retorno) {
            $this->showMessage("Dados inseridos com sucesso!", "ImovelController", "listar");
        }
    }
    function listar()
    {
        $formatter = new Formatter();

        $tipoImovel = $this->tipoimovelDAO->listarTodos();
        $finalidade = $this->finalidadeDAO->listarTodos();
        $proprietario = $this->proprietarioDAO->listarTodos();

        $imoveis = $this->imovelDAO->listarTodos();
        require_once "views/painel/index.php";
    }

    function atualizar($dados, $file)
    {


        if (array_search('imagemcapa', $file)) {
            $imagem = $this->fileUploadService->upload($file['imagemcapa']);
            $retorno = $this->imovelService->atualizarImovel($dados, $imagem);
        } else {
            $retorno = $this->imovelService->atualizarImovel($dados);
        }

        if ($retorno) {
            $this->showMessage("Dados atualizados com sucesso!", "ImovelController", "listar");
        }
    }
    function deletar()
    {
        require_once "views/painel/index.php";
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->showMessage(
                "Deseja excluir o imóvel de ID {$id}?",
                "ImovelController",
                "confirmarDeletar",
                $id
            );
        } else {
            $this->showMessage("ID de imóvel não informado...", "ImovelController", "listar");
        }
    }

    function confirmarDeletar()
    {
        require_once "views/painel/index.php";

        $id = $_GET['id'] ?? null;
        $rowCount = $this->imovelDAO->excluir($id);

        if ($rowCount > 0) {
            $this->showMessage("Imóvel de ID {$id} excluído com sucesso!", "ImovelController", "listar");
        } else {
            $this->showMessage("Falha na exclusão do imóvel de ID {$id}...", "ImovelController", "listar");
        }
    }
    function alterarStatus()
    {
        if ($_POST) {
            var_dump($_POST);
            $this->atualizar($_POST, $_FILES);
        }
    }
    }
?>