<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\Adapters;

use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\UserEntityInterface;

interface RegisterUserRepositoryInterface
{
    public function save(UserEntityInterface $user): UserEntityInterface;
}
