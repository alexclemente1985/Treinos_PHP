<?php
    class Funcionario{
        protected string $nome;
        protected float $salario;
        protected string $cargo;

        public function __construct(string $nome, float $salario, string $cargo)
        {
            $this->nome = $nome;
            $this->salario = $salario;
            $this->cargo = $cargo;
        }

        protected function calcularBonus(): float{
            return $this->salario*0.1;
        }

        public function apresentarFuncionario(): string{
            return "Nome: ".$this->nome." Salário: ".$this->salario." Cargo: ".$this->cargo." \n";
        }
    }
?>