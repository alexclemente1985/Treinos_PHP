<?php
    require_once "Funcionario.php";

    class Departamento{
        public string $nomeDepto;
        public $funcionarios = [];

        public function __construct(string $nomeDepto)
        {
            $this->nomeDepto = $nomeDepto;
        }

        public function adicionarFuncionario(Funcionario $funcionario){
            $this->funcionarios[] = $funcionario;
        }

        public function listarFuncionario():void{
            echo "Funcionários do Departamento ".$this->nomeDepto."\n";
            
            foreach($this->funcionarios as $funcionario){
                echo " ".$funcionario->nome." Cargo: {$funcionario->cargo} \n";
            }
        }
    }
?>