<?php
require_once "interfaceBase.php";

class Pessoa implements InterfaceBase{
    public string $nome;
    public int $idade;

    public function __construct(string $nome, string $idade)
    {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function apresentarPessoa(){
        return "Olá! Me chamo $this->nome e tenho $this->idade anos.\n";
    }

    public function exibirNomeClasse(){
        return "Olá! Eu sou a classe ".__CLASS__."\n";
    }
    public function exibirPropriedadeClasse()
    {
        $propriedade = get_class_vars('Pessoa');
        return "Olá! Eu sou a classe ".__CLASS__." e tenho as seguintes propriedades:\n";

        foreach($propriedade as $key=>$value){
            echo "Propriedade -> $key \n";
        }
    }
    public function exibirTipoPropriedade()
    {
        $prop = get_object_vars($this);
        foreach($prop as $k=>$v){
            echo "Propriedade {$k} -> Tipo {".getType($v)."}\n";
        }


    }
}
?>