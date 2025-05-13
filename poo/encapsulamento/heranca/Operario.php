<?php
class Operario extends Funcionario{        
        public function __construct(string $nome, float $salario, string $cargo)
        {
            parent:: __construct($nome,$salario, $cargo); #equivalente ao super() para instäncia da classe pai
        }

        public function gerarBonus(){
            $bonus = $this->calcularBonus();
            return "$this->nome receberá um salário de $this->salario e um bônus de $bonus \n";
        }
    }
?>