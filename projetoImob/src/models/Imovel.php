<?php
class Imovel{
    private string $id;
    private string $codigo;
    private string $valor;
    private string $cep;
    private string $logradouro;
    private string $bairro;
    private string $cidade;
    private string $quartos;
    private string $banheiros;
    private string $garagem;
    private string $areatotal;
    private string $areaconstruida;
    private string $estatus;
    private string $datacadastro;
    private string $tipoimovel;
    private string $finalidade;
    private string $proprietario;
    private string $imagemcapa;

    public function __construct(
        string $id = '',
        string $codigo = '',
        string $valor = '',
        string $cep = '',
        string $logradouro = '',
        string $bairro = '',
        string $cidade = '',
        string $quartos = '',
        string $banheiros = '',
        string $garagem = '',
        string $areatotal = '',
        string $areaconstruida = '',
        string $estatus = '',
        string $dataCadastro = '',
        string $tipoimovel = '',
        string $finalidade = '',
        string $proprietario = '',
        string $imagemcapa = ''
    )
    {
        date_default_timezone_set('America/Sao_Paulo');
        $this->id = $id;
        $this->codigo = $codigo;
        $this->valor = $valor;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->quartos = $quartos;
        $this->banheiros = $banheiros;
        $this->garagem = $garagem;
        $this->areatotal = $areatotal;
        $this->areaconstruida = $areaconstruida;
        $this->estatus = $estatus;
        $this->datacadastro = $dataCadastro ?? ('Y-m-d H:i:s');
        $this->tipoimovel = $tipoimovel;
        $this->finalidade = $finalidade;
        $this->proprietario = $proprietario;
        $this->imagemcapa = $imagemcapa;
    }

    public function getId(){
        return $this->id;
    }
    public function setId(string $id){
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
                'codigo'=>$this->codigo,
                'valor'=>$this->valor,
                'cep'=>$this->cep,
                'logradouro'=>$this->logradouro,
                'bairro'=>$this->bairro,
                'cidade'=>$this->cidade,
                'quartos'=>$this->quartos,
                'banheiros'=>$this->banheiros,
                'garagem'=>$this->garagem,
                'areatotal'=>$this->areatotal,
                'areaconstruida'=>$this->areaconstruida,
            'estatus' => $this->estatus,
                'datacadastro'=>$this->datacadastro,
                'tipoimovel'=>$this->tipoimovel,
                'finalidade'=>$this->finalidade,
            'proprietario' => $this->proprietario,
            'imagemcapa' => $this->imagemcapa
            ];
    }

    public function atributosPreenchidos()
    {
        #função anônima permite filtrar o preenchimento que tiver valores não nulos ou vazios
        return array_filter($this->toArray(), fn($value) => $value !== null && $value !== '');
    }
}
?>