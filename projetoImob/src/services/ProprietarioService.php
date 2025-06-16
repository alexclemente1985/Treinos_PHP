<?php
require_once "models/Proprietario.php";
require_once "models/DAO/ProprietarioDAO.php";


class ProprietarioService{
    private $proprietarioDAO;

    public function __construct(ProprietarioDAO $proprietarioDAO)
    {
        var_dump($proprietarioDAO);
        $this->proprietarioDAO = $proprietarioDAO;
    }

    public function cadastrarProprietario($dados){
        $proprietario = new Proprietario();

        foreach($dados as $key=>$value){
            $proprietario->$key = $value;
        }

        return $this->proprietarioDAO->adicionar($proprietario);
    }
}
?>