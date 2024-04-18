<?php

declare(strict_types=1);

namespace App\User\Domain\Entity\Interfaces;

use App\Core\Entity\Interfaces\IAudit;
use App\Core\IDto;
use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IPassword;
use App\Core\ValueObject\Interfaces\IUuid;

/**
 * Interface ICreateUserDto
 * @property-read IUuid $id
 * @property-read string $name
 * @property-read IEmail $email
 * @property-read IPassword $password
 * @property-read IAudit $audit
 */
interface ICreateUserDto extends IDto
{
    public function __construct(
        IUuid $id,
        string $name,
        IEmail $email,
        IPassword $password,
        IAudit $audit
    );
}
