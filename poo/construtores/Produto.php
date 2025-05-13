<?php
class Produto{
    private string $descricao;
    private float $preco;

    #Construtores não são obrigatórios, mas são indispensáveis para boas práticas de código

    public function __construct(string $descricao, float $preco)
    {
        $this->setDescricao($descricao);
        $this->setPreco($preco);
    }

    public function getDescricao(): string{
        return $this->descricao;
    }
    public function getPreco(): string{
        return $this->preco;
    }

    public function setDescricao(string $descricao): void{
        $this->descricao = $descricao;
    }

    public function setPreco(float $preco): void{
        $this->preco = $preco;
    }

    public function apresentarProduto(): void{
        echo "O produto {$this->descricao} custa R$ {$this->preco} \n";
    }
}
?>