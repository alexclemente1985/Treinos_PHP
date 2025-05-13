<?php
    require_once "Motor.php";

    class Carro{
        public string $modelo;
        public Motor $motor;

        public function __construct(string $modelo, int $potenciaMotor)
        {

        echo "carro $modelo e potencia $potenciaMotor";
            $this->modelo = $modelo;
            $this->motor = new Motor($potenciaMotor);
        }

        public function exibirDetalhesCarro():void {
            echo "Carro modelo ".$this->modelo." \n";
            $this->motor->apresentarPotencia();
        }
    }
?>