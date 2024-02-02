<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser;

use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Ports\RegisterUserDtoInterface;

final readonly class RegisterUserDto implements RegisterUserDtoInterface
{
    public function __construct(
        public string $name,
        public EmailInterface $email,
        public PasswordInterface $password
    ) {
    }
}
