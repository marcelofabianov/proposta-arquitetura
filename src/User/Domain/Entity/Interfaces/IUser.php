<?php

declare(strict_types=1);

namespace App\User\Domain\Entity\Interfaces;

use App\Core\IEntity;
use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IPassword;
use App\Core\ValueObject\Interfaces\IUuid;

interface IUser extends IEntity
{
    public static function create(ICreateUserDto $dto): self;

    public function getId(): IUuid;

    public function getName(): string;

    public function getEmail(): IEmail;

    public function getPassword(): IPassword;

    public function isActive(): bool;

    public function changePassword(IPassword $password): void;
}
