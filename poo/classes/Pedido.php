<?php
    class Pedido{
        public int $numeroPedido;
        public float $valor;
        public Cliente $cliente;

        public function __construct(int $numeroPedido, float $valor, Cliente $cliente)
        {
            $this->numeroPedido = $numeroPedido;
            $this->valor = $valor;
            $this->cliente = $cliente;
        }

        public function apresentarPedido(): void{
            echo "Número Pedido: ".$this->numeroPedido."\n";
            echo "Valor Pedido: ".$this->numeroPedido."\n";
            echo "Cliente: ".$this->cliente->nome."\n";
            echo "Email cliente: ".$this->cliente->email."\n";
        }
    }
?>