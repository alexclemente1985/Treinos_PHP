<?php
require_once "ContaBancaria.php";

class ContaJuridica extends ContaBancaria{
    public string $cnpj;

    public function __construct(string $cnpj, string $titular, string $numConta, string $agencia, float $saldo)
    {
        parent:: __construct($titular, $numConta, $agencia, $saldo);
        $this->setCnpj($cnpj);
    }

    public function getCnpj(): string{
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): void{
        $this->cnpj = $cnpj;
    }
}
?>