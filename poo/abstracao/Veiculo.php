<?php
abstract class Veiculo{
    protected string $marca;
    protected string $modelo;
    protected string $ano;

    public function __construct(string $marca, string $modelo, string $ano)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    abstract public function acelerar();
    abstract public function frear();
}
?>