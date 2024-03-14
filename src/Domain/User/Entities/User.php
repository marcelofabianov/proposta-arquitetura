<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\Entities;

use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\CreatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\DeletedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\InactivatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UpdatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UuidInterface;
use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\CreateUserDtoInterface;
use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\UserEntityInterface;

final readonly class User implements UserEntityInterface
{
    private UuidInterface $id;

    private string $name;

    private EmailInterface $email;

    private PasswordInterface $password;

    private CreatedAtInterface $createdAt;

    private UpdatedAtInterface $updatedAt;

    private DeletedAtInterface $deletedAt;

    private InactivatedAtInterface $inactivatedAt;

    public function __construct(CreateUserDtoInterface $dto)
    {
        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->email = $dto->email;
        $this->password = $dto->password;
        $this->createdAt = $dto->createdAt;
        $this->updatedAt = $dto->updatedAt;
        $this->deletedAt = $dto->deletedAt;
        $this->inactivatedAt = $dto->inactivatedAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'name' => $this->name,
            'email' => $this->email->toString(),
            'password' => $this->password->toString(),
            'created_at' => $this->createdAt->toString(),
            'updated_at' => $this->updatedAt->toString(),
            'deleted_at' => $this->deletedAt->toString(),
            'inactivated_at' => $this->inactivatedAt->toString(),
        ];
    }
}
