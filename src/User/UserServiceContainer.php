<?php

declare(strict_types=1);

namespace App\User;

use App\Core\Database\Interfaces\IConnection;
use App\Core\IServiceContainer;
use App\Core\Service\Interfaces\IPasswordHashService as ICorePasswordHashService;
use App\User\Application\Service\Interfaces\IUserService;
use App\User\Application\Service\UserService;
use App\User\Domain\UseCase\CreateNewUser\CreateNewUserUseCase;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\ICreateNewUserUseCase;
use App\User\Domain\UseCase\CreateNewUser\Interfaces\IPasswordHashService;
use App\User\Infra\Database\Interfaces\IUserRepository;
use App\User\Infra\Database\UserRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

final class UserServiceContainer implements IServiceContainer
{
    public function register(ContainerBuilder $builder): ContainerBuilder
    {
        $builder = $this->createNEwUserUseCase($builder);

        return $this->userService($builder);
    }

    private function createNEwUserUseCase(ContainerBuilder $builder): ContainerBuilder
    {
        $builder->addDefinitions([
            IUserRepository::class => static function (ContainerInterface $container) {
                return new UserRepository(
                    $container->get(IConnection::class)
                );
            },
        ]);

        $builder->addDefinitions([
            IPasswordHashService::class => static function (ContainerInterface $container) {
                return $container->get(ICorePasswordHashService::class);
            },
        ]);

        $builder->addDefinitions([
            ICreateNewUserUseCase::class => static function (ContainerInterface $container) {
                return new CreateNewUserUseCase(
                    $container->get(IUserRepository::class),
                    $container->get(IPasswordHashService::class)
                );
            },
        ]);

        return $builder;
    }

    private function userService(ContainerBuilder $builder): ContainerBuilder
    {
        $builder->addDefinitions([
            IUserService::class => static function (ContainerInterface $container) {
                return new UserService(
                    $container->get(ICreateNewUserUseCase::class)
                );
            },
        ]);

        return $builder;
    }
}
