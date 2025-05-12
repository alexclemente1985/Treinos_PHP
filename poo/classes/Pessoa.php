<?php
    class Pessoa{
        public string $nome;
        public int $idade;

        public function __construct(string $n, int $i)
        {
            $this->nome = $n;
            $this->idade = $i;
        }

        public function correr(): string{
            return $this->nome. " Está correndo.";
        }

        public function apresentar(): string{
            return "Olá, me chamo {$this->nome} e tenho {$this->idade} de idade. \n";
        }



    }
?>