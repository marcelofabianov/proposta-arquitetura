<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters;

interface RegisterUserRepositoryInterface
{
    public function registerUser(UserEntityInterface $user): UserEntityInterface;
}
