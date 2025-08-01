<?php

require_once "models/DAO/ImovelDAO.php";
require_once "models/DAO/ContatoDAO.php";
require_once "models/Contato.php";
require_once "configurations/Formatter.php";
require_once "models/abstracts/Notification.php";
class BaseController extends Notification
{
        function index(){
        $formatter = new Formatter();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contato = new Contato();
            $contatoDAO = new ContatoDAO();

            foreach ($_POST as $key => $value) {
                $contato->$key = $value;
            }
            $contatoDAO->adicionar($contato);
            $this->showMessage("Mensagem cadastrada com sucesso! Em breve entraremos em contato!");
        }
        $imoveis = (new ImovelDAO())->listarTodos();
            require_once 'views/home/index.php';
        }
    }
?>