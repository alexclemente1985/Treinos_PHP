<?php
class Carro{
    private string $modelo;
    private string $marca;
    private int $ano;

    public function __construct(string $modelo, string $marca, string $ano)
    {
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
    }

    public function ExibirDetalhesCarro(): void{
        echo "O carro ".$this->modelo." é da marca ".$this->marca." do ano ".$this->ano." \n";
    }

    public function getMarca(): string{
        return $this->marca;
    }

    public function getModelo(): string{
        return $this->modelo;
    }

    public function getAno(): int{
        return $this->ano;
    }

    public function setMarca(string $marca): void{
        $this->marca = $marca;
    }

    public function setModelo(string $modelo): void{
        $this->modelo = $modelo;
    }

    public function setAno(int $ano): void{
        $this->ano = $ano;
    }
}
?>