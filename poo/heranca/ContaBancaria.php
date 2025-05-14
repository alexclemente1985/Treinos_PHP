<?php
class ContaBancaria{
    protected string $titular;
    protected string $numConta;
    protected string $agencia;
    protected float $saldo;

    public function __construct(string $titular, string $numConta, string $agencia, float $saldo)
    {
        $this->setTitular($titular);
        $this->setNumConta($numConta);
        $this->setAgencia($agencia);
        $this->setSaldo($saldo);
    }

    public function consultarSaldo(): void{
        echo "Saldo atual da conta: R$ $this->saldo.\n";
    }

    public function sacar($valor):void {
        if($valor <= 0):
            throw new InvalidArgumentException("Valor inválido para saque.");
        endif;
        if($valor > $this->saldo):
            throw new InvalidArgumentException("Valor insuficiente na conta.");
        endif;

        $this->saldo -= $valor;
        echo "Saque de $valor realizado com sucesso!\nNovo saldo: R$ $this->saldo.\n";
    }

    public function depositar($valor):void {
        if($valor <= 0):
            throw new InvalidArgumentException("Valor inválido para depósito.");
        endif;

        $this->saldo += $valor;
        echo "Depósito de $valor realizado com sucesso!\nNovo saldo: R$ $this->saldo.\n";
    }

    public function getTitular(): string{
        return $this->titular;
    }

    public function setTitular(string $titular): void{
        $this->titular = $titular;
    }
    public function getNumConta(): string{
        return $this->numConta;
    }

    public function setNumConta(string $numConta): void{
        $this->numConta = $numConta;
    }
    public function getAgencia(): string{
        return $this->agencia;
    }

    public function setAgencia(string $agencia): void{
        $this->agencia = $agencia;
    }
    public function getSaldo(): float{
        return $this->saldo;
    }

    public function setSaldo(float $saldo): void{
        $this->saldo = $saldo;
    }
}
?>