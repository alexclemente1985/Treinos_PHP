<?php
class Finalidade{
    private string $id;
    private string $descricao;

    public function __construct(string $id = '', string $descricao = '')
    {
        $this->id = $id;
        $this->descricao = $descricao;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id) {}
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }
}
?>