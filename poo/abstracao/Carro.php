<?php
require_once "Veiculo.php";

class Carro extends Veiculo{
    public function acelerar()
    {
        echo "O carro da marca $this->marca e do modelo $this->modelo está está acelerando... \n";
    }
    public function frear()
    {
        return "O carro da marca $this->marca e do modelo $this->modelo está freiando...\n";
    }
}
?>