<?php
class  Motor
{
    public int $potencia;

    public function __construct(int $potencia)
    {
            $this->potencia = $potencia;
        }

    public function apresentarPotencia(): void
    {
        echo "Este carro tem a potência de: " . $this->potencia . " cavalos.\n";
        }
    }
?>