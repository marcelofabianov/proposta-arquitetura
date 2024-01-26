<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Ports\RegisterUserDtoInterface;

final readonly class RegisterUserDto implements RegisterUserDtoInterface
{
    public function __construct(
        public string $name,
        public EmailInterface $email,
        public PasswordInterface $password
    ){
    }
}
