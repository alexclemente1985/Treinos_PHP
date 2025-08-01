<?php

require_once "models/DAO/ContatoDAO.php";
require_once "models/Contato.php";

class PainelService{
    private $contatoDAO;
    private $contato;

    public function __construct(ContatoDAO $contatoDAO)
    {
        $this->contatoDAO = $contatoDAO;
    }

    public function atualizarContato($dados)
    {
        $this->contato = new Contato();

        foreach ($dados as $key => $value) {
            $this->contato->$key = $value;
        }

        return $this->contatoDAO->atualizarContato($this->contato);
    }
}
?>