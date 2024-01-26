<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\User\Entities;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\CreatedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\DeletedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\InactivatedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\UpdatedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\UuidInterface;
use Marcelofabianov\Ddd\Domain\User\Entities\Ports\UserEntityInterface;

final class User implements UserEntityInterface
{
    private UuidInterface $id;

    private string $name;

    private EmailInterface $email;

    private PasswordInterface $password;

    private CreatedAtInterface $createdAt;

    private UpdatedAtInterface $updatedAt;

    private DeletedAtInterface $deletedAt;

    private InactivatedAtInterface $inactivatedAt;

    public function setId(UuidInterface $id): UserEntityInterface
    {
        $this->id = $id;

        return $this;
    }

    public function setName(string $name): UserEntityInterface
    {
        $this->name = $name;

        return $this;
    }

    public function setEmail(EmailInterface $email): UserEntityInterface
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(PasswordInterface $password): UserEntityInterface
    {
        $this->password = $password;

        return $this;
    }

    public function setCreatedAt(CreatedAtInterface $createdAt): UserEntityInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function setUpdatedAt(UpdatedAtInterface $updatedAt): UserEntityInterface
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function setDeletedAt(DeletedAtInterface $deletedAt): UserEntityInterface
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function setInactivatedAt(InactivatedAtInterface $inactivatedAt): UserEntityInterface
    {
        $this->inactivatedAt = $inactivatedAt;

        return $this;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): EmailInterface
    {
        return $this->email;
    }

    public function getPassword(): PasswordInterface
    {
        return $this->password;
    }

    public function getCreatedAt(): CreatedAtInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): UpdatedAtInterface
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): DeletedAtInterface
    {
        return $this->deletedAt;
    }

    public function getInactivatedAt(): InactivatedAtInterface
    {
        return $this->inactivatedAt;
    }
}
