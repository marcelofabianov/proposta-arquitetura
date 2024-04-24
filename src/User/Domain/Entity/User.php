<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Audit\Domain\Entity\Interfaces\IAudit;
use App\Core\Exceptions\EntityException;
use App\Core\ValueObject\Interfaces\IEmail;
use App\Core\ValueObject\Interfaces\IPassword;
use App\Core\ValueObject\Interfaces\IUuid;
use App\Core\ValueObject\ToStringJson;
use App\User\Domain\Entity\Interfaces\ICreateUserDto;
use App\User\Domain\Entity\Interfaces\IUser;

final class User implements IUser
{
    use ToStringJson;

    private function __construct(
        private readonly IUuid $id,
        private readonly string $name,
        private readonly IEmail $email,
        private IPassword $password,
        private readonly IAudit $audit
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'name' => $this->name,
            'email' => $this->email->toString(),
            'password' => $this->password->toString(),
            'audit' => $this->audit->toArray(),
        ];
    }

    public function getId(): IUuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): IEmail
    {
        return $this->email;
    }

    public function getPassword(): IPassword
    {
        return $this->password;
    }

    public function getAudit(): IAudit
    {
        return $this->audit;
    }

    public function changePassword(IPassword $password): void
    {
        $this->password = $password;
    }

    /**
     * @throws \App\Core\Exceptions\Interfaces\IEntityException|\Exception
     */
    public static function create(ICreateUserDto $dto): IUser
    {
        try {
            return new self(
                $dto->id,
                $dto->name,
                $dto->email,
                $dto->password,
                $dto->audit
            );
        } catch (EntityException|\Exception $exception) {
            throw EntityException::invalidData(self::class, $exception->getMessage());
        }
    }
}
