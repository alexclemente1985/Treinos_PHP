<?php
require_once "models/Proprietario.php";
require_once "models/DAO/ProprietarioDAO.php";

class ProprietarioService{
    private $proprietarioDAO;
    private $proprietario;

    public function __construct(ProprietarioDAO $proprietarioDAO)
    {
        $this->proprietarioDAO = $proprietarioDAO;
    }

    public function cadastrarProprietario($dados){
        $this->proprietario = new Proprietario();

        foreach($dados as $key=>$value){
           $this->proprietario->$key = $value;
        }

        return $this->proprietarioDAO->adicionar($this->proprietario);
    }

    public function atualizarProprietario($dados)
    {
        $this->proprietario = new Proprietario();

        foreach ($dados as $key => $value) {
            $this->proprietario->$key = $value;
        }

        return $this->proprietarioDAO->atualizarProprietario($this->proprietario);
    }
}
?>