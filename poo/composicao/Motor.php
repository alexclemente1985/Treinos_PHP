<?php
class  Motor
{
    public int $potencia = 0;

    public function __contruct(int $potencia)
    {
            $this->potencia = $potencia;
        }

    public function apresentarPotencia(): void
    {
        echo "Este carro tem a potência de :" . $this->potencia . " cavalos.\n";
        }
    }
?>