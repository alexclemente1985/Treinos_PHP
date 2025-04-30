# Notas de aula

## Inicialização do server php
- `php -S localhost:<PORTA>`

## Arquivo index.php
- Único ponto de entrada na aplicação;
- Responsável pelo roteamento das páginas de acordo com a solicitação no navegador;
- Validação por meio da variável `$_SERVER['PATH_INFO']`;
- Único arquivo _.php_ que vai para dentro da pasta _public_;

## Uso de pasta PUBLIC

- Isola arquivos acessíveis do servidor daqueles que não devem ser acessados diretamente;
- **Server Local PHP:** Acrescentar `-t public/` no final do comando convencional de start do server php;
    - `php -S localhost:<PORTA> -t public/`

## Critérios de segurança

- Nos comando _SQL_, usar sempre **_prepared statements_** para evitar **_SQL Injection_**;
- Usar estrutura **_Common Directory_** (deixar apenas o necessário acessível ao servidor web, usando a pasta **_public/_**);
- Uso repetido de `if` no index.php para o roteamento, ao invés de `require` para cada `PATH_INFO` com `.php` no final foi devido ao intuito de se evitar vulnerabilidade grave 
    - [Null bytes related issues](https://www.php.net/security.filesystem.nullbytes)


## Composer

### Criando pasta vendor com autoload

- Criar arquivo `composer.json` na raiz do projeto, com as informações necessárias;
    ```{
        "autoload": {
            "psr-4": {
                "Alura\\Mvc\\": "src/"
            }
        }
    }```

- No terminal: `composer dumpautoload`;
- No index.php de entrada, fazer o `require ` do `vendor\autoload`:
    `require_once __DIR__ . '/../vendor/autoload.php';`