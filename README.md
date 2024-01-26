# Proposta de arquitetura

Um pequeno projeto para apresentar uma proposta de arquitetura utilizando conceitos

- DDD
- SOLID
- Ports and Adapters
- Clean Architecture

```
src/
├── Domain
│   ├── Core
│   │   ├── Exceptions
│   │   │   ├── DomainCoreException.php
│   │   │   ├── DomainCoreValueObjectException.php
│   │   │   ├── DomainEntityCoreException.php
│   │   │   ├── Enums
│   │   │   │   └── ExceptionCodeEnum.php
│   │   │   └── Ports
│   │   │       ├── DomainCoreEntityCoreExceptionInterface.php
│   │   │       ├── DomainCoreExceptionInterface.php
│   │   │       └── DomainCoreValueObjectExceptionInterface.php
│   │   └── ValueObjects
│   │       ├── Adapters
│   │       │   └── UuidGenerateInterface.php
│   │       ├── CreatedAt.php
│   │       ├── DatetimeValueObjectInterface.php
│   │       ├── DeletedAt.php
│   │       ├── Email.php
│   │       ├── InactivatedAt.php
│   │       ├── Monetary.php
│   │       ├── NullableValueObjectInterface.php
│   │       ├── Password.php
│   │       ├── Ports
│   │       │   ├── CreatedAtInterface.php
│   │       │   ├── DeletedAtInterface.php
│   │       │   ├── EmailInterface.php
│   │       │   ├── InactivatedAtInterface.php
│   │       │   ├── MonetaryInterface.php
│   │       │   ├── PasswordInterface.php
│   │       │   ├── UpdatedAtInterface.php
│   │       │   └── UuidInterface.php
│   │       ├── UpdatedAt.php
│   │       ├── Uuid.php
│   │       └── ValueObjectInterface.php
│   └── User
│       ├── Entities
│       │   ├── Ports
│       │   │   └── UserEntityInterface.php
│       │   └── User.php
│       └── Exceptions
│           ├── DomainUserEntityException.php
│           └── Ports
│               └── DomainUserEntityExceptionInterface.php
├── main.php
├── Shared
│   └── Services
│       ├── Ports
│       │   └── UuidGenerateInterface.php
│       └── UuidGenerate.php
└── User
    ├── Application
    │   └── UseCases
    │       └── RegisterUser
    │           ├── Adapters
    │           │   ├── RegisterUserRepositoryInterface.php
    │           │   └── UserEntityInterface.php
    │           ├── Ports
    │           │   ├── RegisterUserDtoInterface.php
    │           │   └── RegisterUserUseCaseInterface.php
    │           ├── RegisterUserDto.php
    │           └── RegisterUserUseCase.php
    └── Infrastructure
        ├── Command
        ├── Http
        │   └── Controllers
        │       └── UsersController.php
        ├── Persistence
        │   ├── Ports
        │   │   └── UserRepositoryInterface.php
        │   └── UserRepository.php
        ├── Queues
        └── Resources
            └── config
                ├── routes.yaml
                ├── service.yaml
                └── User.orm.yml
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
