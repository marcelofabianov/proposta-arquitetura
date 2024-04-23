# Proposta de arquitetura

Um pequeno projeto para apresentar uma proposta de arquitetura utilizando conceitos

- DDD
- SOLID
- Ports and Adapters
- Clean Architecture

```
src/
├── Core
│ ├── CoreServiceContainer.php
│ ├── Database
│ │ ├── Connection.php
│ │ ├── DatabaseConfig.php
│ │ └── Interfaces
│ │     ├── IConnection.php
│ │     └── IDatabaseConfig.php
│ ├── Entity
│ │ ├── Audit.php
│ │ └── Interfaces
│ │     └── IAudit.php
│ ├── Exceptions
│ │ ├── CoreException.php
│ │ ├── EntityException.php
│ │ ├── Interfaces
│ │ │ ├── ICoreException.php
│ │ │ ├── IEntityException.php
│ │ │ ├── IPasswordException.php
│ │ │ └── IValueObjectException.php
│ │ ├── PasswordException.php
│ │ └── ValueObjectException.php
│ ├── IDateTime.php
│ ├── IDto.php
│ ├── IEntity.php
│ ├── INullable.php
│ ├── IServiceContainer.php
│ ├── IValueObject.php
│ ├── Service
│ │ ├── Interfaces
│ │ │ └── IPasswordHashService.php
│ │ └── PasswordHashService.php
│ └── ValueObject
│     ├── Interfaces
│     │ └── IUuid.php
│     └── Uuid.php
├── main.php
└── User
    ├── Application
    │ ├── Interfaces
    │ │ └── IUserService.php
    │ └── UserService.php
    ├── Domain
    │ ├── Entity
    │ │ ├── Dto
    │ │ ├── Interfaces
    │ │ └── User.php
    │ └── UseCase
    │     └── CreateNewUser
    ├── Infra
    │ └── Database
    │     ├── Interfaces
    │     └── UserRepository.php
    └── UserServiceContainer.php

```

## Requisitos

- Docker 24+
- Docker Compose 2.23+

## Para iniciar

1. Clone o repositório

```bash
git git@github.com:marcelofabianov/proposta-arquitetura-02.git
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
Executando migrations
```bash
app.migrate
```

Executando down migrations

```bash
app.migrate:down
```
