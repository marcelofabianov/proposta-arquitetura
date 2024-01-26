<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Adapters;

interface RegisterUserRepositoryInterface
{
    public function registerUser(UserEntityInterface $user): UserEntityInterface;
}
