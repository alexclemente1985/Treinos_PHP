<?php
    class Motor{
        public int $potencia;

        public function __contruct(int $potencia){
            $this->potencia = $potencia;
        }

        public function apresentarPotencia(): int{
            return "Este carro tem a potência de :".$this->potencia." cavalos.";
        }
    }
?>