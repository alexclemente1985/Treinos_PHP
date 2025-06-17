<?php
class Conexao{
    private static $conexao;

    protected static function getConexao(){
        //Criando conexão com bd via PDO
        if(self::$conexao===null){
            $info = "mysql:host=localhost;dbname=casaweb";

            try{
                #PDO -> objeto responsável pela conexão com o BD
                #Setando cadeia de caracteres como UTF-8
                self::$conexao = new PDO($info, "tester", "123456", [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
                #Definindo retorno dos erros possíveis no banco de dados
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                #die-> permite obtenção da mensagem de erro finalizando a conexão na sequência
                die('Erro ao conectar com o banco de dados '.$e->getMessage());
            }
        }
        return self::$conexao;
    }

    #método responsável pelo fechamento da conexão com o banco de dados
    protected static function closeConexao(){
        self::$conexao = null;
    }

    protected function executarConsulta(string $sql, array $valores = []){
        try{
            $statement = self::getConexao()->prepare($sql);

            foreach($valores as $key=>$value){
                $statement->bindValue($key+1, $value);
            }

            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die("Erro ao executar consulta no banco de dados: ".$e->getMessage());
        }
    }

    protected function listar($tabela, $condicao = "", $parametro = []){
        $sql = "SELECT * FROM {$tabela} {$condicao} ORDER BY ID DESC ";
        $statement = $this->executarConsulta($sql, $parametro);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    protected function inserir($tabela, $atributos, $valores){
        #implode -> cria uma string separada pelo caractere escolhido (primeiro parâmetro) a partir de um array
        #array_fill -> cria um array com tamanho definido e com preenchimento a partir do valor inserido no terceiro parâmetro
        $sql = "INSERT INTO {$tabela} (".implode(",", $atributos).") VALUES(".implode(",", array_fill(0,count($valores), "?")).")";

        $statement = $this->executarConsulta($sql,$valores);
        return self::getConexao()->lastInsertId();
    }

    protected function atualizar($tabela, $campos, $valores, $id){
        #array_map -> permite o retorno de um array preenchido com uma determinada formatação, a partir de um array original
        #?-> evita o SQL INJECTION
        $set = implode(",", array_map(fn($campo)=>"$campo = ?", $campos));
        $sql = "UPDATE {$tabela} SET {$set} WHERE ID = ? ";

        #array_merge -> permite a junção de dois arrays diferentes
        $statement = $this->executarConsulta($sql, array_merge($valores, [$id]));

        return $statement->rowCount();
    }

    protected function deletar($tabela, $id){
        $sql = "DELETE {$tabela} WHERE ID = ?";
        $statement = $this->executarConsulta($sql, [$id]);

        return $statement->rowCount();
    }
}
?>