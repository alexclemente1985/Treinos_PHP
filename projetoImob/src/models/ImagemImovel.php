<?php
require_once "";

class ImagemImovel
{
    private string $id;
    private string $imagem;
    private string $imovel;

    public function __construct(
        string $id = '',
        string $imagemImovel,
        string $imovel
    ){
        $this->id=$id;
        $this->imagem = $imagemImovel;
        $this->imovel = $imovel;
    }

    public function getId(){
        return $this->id;
    }

    public function toArray(){
        return [
            "id" => $this->id,
            "imagem" => $this->imagem,
            "imovel" => $this->imovel,
        ];
    }

     public function atributosPreenchidos()
    {
        #função anônima permite filtrar o preenchimento que tiver valores não nulos ou vazios
        return array_filter($this->toArray(), fn($value) => $value !== null && $value !== '');
    }

}
?>