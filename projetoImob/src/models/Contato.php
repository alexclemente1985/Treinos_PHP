<?php
class Contato{
    private string $id;
    private string $datamensagem;
    private string $nome;
    private string $sobrenome;
    private string $email;
    private string $interesse;
    private string $mensagem;
    private string $ativo;

    public function __construct(
        $id = '',
        $nome = '',
        $sobrenome = '',
        $email = '',
        $interesse ='',
        $mensagem = '',
        $ativo = ''
    )
    {
       date_default_timezone_set('America/Sao_Paulo');
       $this->id = $id;
       $this->datamensagem = date('Y-m-d H:i:s');
       $this->nome = $nome;
       $this->sobrenome = $sobrenome;
       $this->email = $email;
       $this->interesse = $interesse;
       $this->mensagem = $mensagem;
       $this->ativo = $ativo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function __get($name){
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
    public function __set($name, $value){
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function toArray(){
            return[
                'id'=>$this->id,
                'nome'=>$this->nome,
                'sobrenome'=>$this->sobrenome,
                'email'=>$this->email,
                'interesse'=>$this->interesse,
                'mensagem'=>$this->mensagem,
                'datamensagem'=>$this->datamensagem,
                'ativo'=>$this->ativo
            ];
    }

    public function atributosPreenchidos()
    {
        #função anônima permite filtrar o preenchimento que tiver valores não nulos ou vazios
        return array_filter($this->toArray(), fn($value) => $value !== null && $value !== '');
    }
}
?>