<?php
require_once "Veiculo.php";

class Moto extends Veiculo{
    public function acelerar()
    {
        echo "A moto da marca $this->marca e do modelo $this->modelo está está acelerando...\n";
    }
    public function frear()
    {
        return "A moto da marca $this->marca e do modelo $this->modelo está freiando...\n";
    }
}
?>