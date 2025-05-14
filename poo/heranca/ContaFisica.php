<?php
require_once "ContaBancaria.php";

class ContaFisica extends ContaBancaria{
    public string $cpf;

    public function __construct(string $cpf, string $titular, string $numConta, string $agencia, float $saldo)
    {
        parent:: __construct($titular, $numConta, $agencia, $saldo);
        $this->setcpf($cpf);
    }

    public function getCpf(): string{
        return $this->cpf;
    }

    public function setCpf(string $cpf): void{
        $this->cpf = $cpf;
    }
}
?>