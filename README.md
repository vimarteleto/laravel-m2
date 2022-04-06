## Projeto CRUD em Laravel

O projeto foi desenvolvido utilizando Sanctum para autenticação de APIs e containers Docker com a solução Sail do Laravel.
As aplicações ocupam as portas padrões.


## Instalação da aplicação

Para criação do arquivo de variáveis de ambiente:
```bash
cp .env.example .env
```

Para instalação das dependências via imagem do composer:
```bash
docker run --rm -v $(pwd):/app composer/composer install
```

Para inicialização dos containers:
```bash
vendor/bin/sail up
```

Para criação das tabelas do banco de dados:
```bash
vendor/bin/sail php artisan migrate:fresh
```

Para inserção de dados nas tabelas do banco de dados:
```bash
vendor/bin/sail php artisan db:seed
```

Para geração das chaves:
```bash
vendor/bin/sail php artisan key:generate
```

## Acessos de API

Não existem usuários nas seeds, é preciso efetuar o POST na rota ```/api/register```.
A partir da rota ```/api/login``` será gerado o token de acesso para as demais rotas.

O arquivo ```insomnia.json``` na raíz do projeto contém os requests feitos no Insomnia.
