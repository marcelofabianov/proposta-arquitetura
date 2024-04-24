<?php

declare(strict_types=1);

namespace App\User\Domain\Entity\Dto;

use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IPassword;
use App\Core\ValueObject\Interfaces\IUuid;
use App\Core\ValueObject\Uuid;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;

final readonly class CreateUserDto implements ICreateUserDto
{
    public IUuid $id;

    public function __construct(
        public string $name,
        public IEmail $email,
        public IPassword $password,
        IUuid|null $id = null,
        public bool $active = false,
    ) {
        $this->id = $id ?? Uuid::random();
    }
}
