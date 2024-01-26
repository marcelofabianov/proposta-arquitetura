# PHP 8.3

Ambiente docker para se trabalhar com PHP 8.3.

## Extensões

Algumas extensões já estão instaladas, mas você pode adicionar mais no arquivo `_docker/php/Dockerfile`.

- bcmath
- intl
- opcache
- mbstring
- soap
- redis
- apcu
- xdebug
- swoole
- pgsql
- pdo_pgsql

## Requisitos

Recomendo ter em seu ambiente:

- Docker 24+
- Docker Compose 2.23+

## Para iniciar

1. Clone o repositório

```bash
git git@github.com:marcelofabianov/docker-php8.3-fpm.git
```

2. Preparando o ambiente

```bash
sh _docker/local/init.sh
```

## Para acessar o container

Utilize o comando abaixo para acessar o container:

```bash
docker exec -it app zsh
```

## Para utilizar os alias

Pode ser utilizado alias para executar comando fora dele.

```bash
source .alias
```

## Utilizando o container

Foi adicionado o `zsh` para facilitar a utilização do container, junto de alguns plugins para melhorar a experiência.
Também foi adicionado o `composer` para facilitar a instalação de dependências.
Alguns exemplos de comandos podem ser vistos abaixo.

Para ver a versão do PHP

```bash
php -v
```

Para ver os módulos do PHP

```bash
php -m
```

Para ver o `php.ini`

```bash
php --ini
```

Para ver a versão do Composer

```bash
composer -V
