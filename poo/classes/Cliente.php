<?php
    class Cliente{
        public string $nome;
        public string $email;

        public function __construct(string $n, string $e)
        {
            $this->nome = $n;
            $this->email = $e;
        }
    }
?>