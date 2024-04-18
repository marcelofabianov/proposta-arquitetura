<?php

declare(strict_types=1);

namespace App\User\Domain\Entity\Dto;

use App\Core\Entity\Interfaces\IAudit;
use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IPassword;
use App\Core\ValueObject\Interfaces\IUuid;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;

final readonly class CreateUserDto implements ICreateUserDto
{
    public function __construct(
        public IUuid $id,
        public string $name,
        public IEmail $email,
        public IPassword $password,
        public IAudit $audit
    ) {
    }
}
