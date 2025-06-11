<?php
class Proprietario{
    private int $id;
    private string $nome;
    private string $contato;
    private string $sexo;
    private string $ativo;

    public function __construct(?int $id = null, ?string $nome = null, ?string $contato = null, ?string $sexo = null, ?string $ativo = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->contato = $contato;
        $this->sexo = $sexo;
    }

    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id){

    }

    public function __set($name, $value)
    {
        if(property_exists($this, $name)){
            $this->$name = $value;
        }
    }

    public function toArray(){
        return[
            'id'=>$this->id,
            'nome'=>$this->nome,
            'contato'=>$this->contato,
            'sexo'=>$this->sexo,
            'ativo'=>$this->ativo
        ];
    }

    public function atributosPreenchidos(){
        #função anônima permite filtrar o preenchimento que tiver valores não nulos ou vazios
        return array_filter($this->toArray(), fn($value)=> $value !== null && $value !== '');
    }
}
?>