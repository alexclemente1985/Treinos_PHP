<?php
require_once "Eletronicos.php";

class Tv extends Eletronicos{
    private string $modelo;
    private int $polegadas;

    public function __construct(string $modelo, int $polegadas, string $marca)
    {
        parent:: __construct($marca);
        $this->modelo = $modelo;
        $this->polegadas = $polegadas;
    }

    public function getModelo(): string{
        return $this->modelo;
    }

    public function setModelo(string $modelo): void{
        $this->modelo = $modelo;
    }

    public function getPolegadas(): int{
        return $this->polegadas;
    }

    public function setpolegadas(int $polegadas): void{
        $this->polegadas = $polegadas;
    }

    public function apresentar(){
        echo "A TV $this->marca $this->modelo possui $this->polegadas polegadas. \n";
    }
}
?>