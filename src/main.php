<?php

use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Email;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Password;
use Marcelofabianov\MyMoney\Domain\User\Entities\CreateUserDto;
use Marcelofabianov\MyMoney\Domain\User\Entities\User;
use Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\RegisterUserUseCase;
use Marcelofabianov\MyMoney\Shared\Services\Database\ConnectionDatabase;
use Marcelofabianov\MyMoney\Shared\Services\Database\DatabaseAdapterPostgresConnection;
use Marcelofabianov\MyMoney\User\Infrastructure\Persistence\UserRepository;

require __DIR__ . '/../vendor/autoload.php';

$adapter = new DatabaseAdapterPostgresConnection(
    host: 'db',
    port: 5432,
    database: 'app_db',
    username: 'user',
    password: 'secret'
);

$connection = ConnectionDatabase::getInstance($adapter);

$repository = new UserRepository($connection);

$useCase = new RegisterUserUseCase($repository);

try {
    $dto = new CreateUserDto(
        name: 'Marcelo Fabiano',
        email: Email::random(),
        password: Password::random()
    );
} catch (Exception $exception) {
    dd($exception);
}

$user = new User($dto);

$user = $useCase->execute($user);

dd($user);
