<?php
    class Usuario{
        private string $id;
        private string $nome;
        private string $usuario;
        private string $senha;
        private string $email;
        private string $imagem;
        private string $datacadastro;
        private string $ativo;

        public function __construct(
                string $id='',
                string $nome='',
                string $usuario='',
                string $senha='',
                string $email='',
                string $imagem='',
                string $datacadastro='',
                string $ativo=''
                )
            {
                $this->id = $id;
                $this->nome = $nome;
                $this->usuario = $usuario;
                $this->senha = $senha;
                $this->email = $email;
                $this->imagem = $imagem;
                $this->datacadastro = $datacadastro;
                $this->ativo = $ativo;
            }

        public function __set($name, $value)
        {
            if(property_exists($this, $name)){
                $this->$name = $value;
            }
        }

        public function __get($name)
        {
            if (property_exists($this, $name)) {
                return $this->$name;
            }
        }

         public function getId(): int{
            return $this->id;
        }


        public function toArray(){
            return[
                'id'=>$this->id,
                'nome'=>$this->nome,
                'usuario'=>$this->usuario,
                'senha'=>$this->senha,
                'email'=>$this->email,
                'imagem'=>$this->imagem,
                'datacadastro'=>$this->datacadastro,
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