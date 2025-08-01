<?php

require_once "models/DAO/ContatoDAO.php";
require_once "configurations/Formatter.php";
require_once "services/PainelService.php";
require_once "models/abstracts/Notification.php";

class PainelController extends Notification
{

    private $contatoDAO;
    private $formatter;
    private $painelService;

    public function __construct()
    {
        $this->contatoDAO = new ContatoDAO();
        $this->formatter = new Formatter();
        $this->painelService = new PainelService($this->contatoDAO);
    }

    function index()
    {
        $mensagens = $this->contatoDAO->listarTodos();
            if($_GET){
                $controller = strtolower(str_replace("Controller","",$_GET['controller']));
                $method = strtolower($_GET['method']);

                if ($controller == 'painel' && $method == 'index'){
                    require_once "Views/painel/index.php";
                }
                else{
                require_once "Views/painel/" . $controller . "/" . $method . ".php";
                }
        }
    }
    function alterarStatus()
    {
        var_dump($_POST);
        if ($_POST) {
            $this->atualizar($_POST);
        }
    }

    function atualizar($dados)
    {
        $retorno = $this->painelService->atualizarContato($dados);
        $_SESSION['TESTE'] = $retorno;
        $_SESSION['DADOS_ATUALIZAR_CONTATO'] = implode(" | ", $dados);
        if ($retorno) {
            $this->showMessage("Dados atualizados com sucesso!", "PainelController", "index");
        }
    }
    }
?>