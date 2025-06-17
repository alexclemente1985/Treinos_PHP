<?php
class Proprietario{
    private int $id;
    private string $nome;
    private string $contato;
    private string $sexo;
    private string $ativo;

    public function __construct(?int $id = 0, ?string $nome = '', ?string $contato = '', ?string $sexo = '', ?string $ativo = '')
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->contato = $contato;
        $this->sexo = $sexo;
        $this->ativo = '1';
    }

    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id){

    }
    public function getNome(): int
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    public function getContato(): int
    {
        return $this->contato;
    }

    public function setContato(string $contato)
    {
        return $this->contato = $contato;
    }
    public function getAtivo(): int
    {
        return $this->ativo;
    }

    public function setAtivo(string $ativo)
    {
        return $this->ativo = $ativo;
    }

    public function __set($name, $value)
    {
        if(property_exists($this, $name)){
            $this->name = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->name;
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