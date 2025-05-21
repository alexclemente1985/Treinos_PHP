<?php
class Cliente{
    private int $id;
    private string $name;
    private string $cpf;

    public function __construct(int $id = 0, string $name = "", string $cpf="")
    {
        $this->id = $id;
        $this->name = $name;
        $this->cpf = $cpf;

    }

    public function getId(): int{
        return $this->id;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getCPF(): string{
        return $this->cpf;
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function setName(string $name){
        $this->$name = $name;
    }
    public function setCPF(string $cpf){
        $this->cpf = $cpf;
    }

    #Alimentação dos dados enquanto não se tem banco de dados definido
    public function generateData(){
        return $clientes = [
            new Cliente(1,"Alex","111.111.111-11"),
            new Cliente(2,"Jonas","222.222.222-22"),
            new Cliente(3,"Caio","333.333.333-33"),
            new Cliente(4,"Priscilla","444.444.444-44"),
            new Cliente(5,"Nanci","555.555.555-55")
        ];
    }

    public function getAllClients(){
        return $this->generateData();
    }

    public function getClientByID(int $id){
        $clientes = $this->generateData();

        foreach($clientes as $cliente){
            if($id == $cliente->getId()){
                return $cliente;
            }
        }

        return null;
    }

    public function getClientByName(string $name){
        $clientes = $this->generateData();

        foreach($clientes as $cliente){
            if($name == $cliente->getName()){
                return $cliente;
            }
        }

        return null;
    }

    public function getClientByCPF(string $cpf){
        $clientes = $this->generateData();

        foreach($clientes as $cliente){
            if($cpf == $cliente->getCPF()){
                return $cliente;
            }
        }

        return null;
    }



}
?>