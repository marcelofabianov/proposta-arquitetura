# Proposta de arquitetura

Um pequeno projeto para apresentar uma proposta de arquitetura utilizando conceitos

- DDD
- SOLID
- Ports and Adapters
- Clean Architecture

```
src/

```

## Requisitos

- Docker 24+
- Docker Compose 2.23+

## Para iniciar

1. Clone o repositório

```bash
git git@github.com:marcelofabianov/docker-php8.3-fpm.git
```

2. Preparando o ambiente

```bash
sh _local/init.sh
```
3. Carregando alias

```bash
source .alias.sh
```

4 Executando comando com o container

Subir containers
```bash
app.up
```

Baixar containers
```bash
app.down
```

Restart nos containers
```bash
app.restart
```

Entrar no container app
```bash
app.zsh
```

Executando comandos com o php
```bash
app.php -v
```

Executando comandos do composer
```bash
app.composer -v
```

Executando comando de testes
```bash
app.test
```

Executando lint
```bash
app.lint
```
```bash
app.check
```

Executando server php http
```bash
app.server
```
