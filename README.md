# PDWEL

### _Projeto final de avaliação da disciplina PDWEL - Programação Dinâmica para Web_

O projeto se trata de cadastro de produtos, com autenticação de usuário.

### Alunos Integrantes

- Ana Carolina B. P. de Moraes - SP3017206
- Debora de Aguiar Boni - SP3021599
- Rebeca de Souza Santos - SP3013341
- Vitor Massao Sugai - SP3013511

## Frameworks 

- [Bootstrap](https://getbootstrap.com/)
- [Laravel](https://laravel.com/)

## Pré-requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html).
- [Composer](https://getcomposer.org/download/).

## Instalação

Após o download, descompacte o projeto para dentro da pasta htdocs que fica no local de instalação do XAMPP.

Abra o projeto no Visual Studio Code.

No terminal, execute o seguinte comando, dentro da pasta onde está o projeto:

```
composer install
```

Após isso, inicie o Apache e o MySQL no XAMPP.

Acesse http://localhost/phpmyadmin/ e crie um banco de dados com o nome que deseja utilizar.

No terminal do Visual Studio Code, entre com o seguinte comando:

```
cp .env.example .env
```

No arquivo .env criado, altere as seguintes variáveis de acordo com as suas configurações do MySQL

| Variável |  |
| ------ | ------ |
| DB_DATABASE | coloque o nome do banco de dados criado |
| DB_USERNAME | username do MySQL |
| DB_PASSWORD | senha do MySQL |

Após a configuração do arquivo .env, digite o seguinte comando:

```
php artisan key:generate
```

E na sequência, 

```
php artisan serve
```

Após isso, você já pode acessar o projeto no http://localhost:8000/
