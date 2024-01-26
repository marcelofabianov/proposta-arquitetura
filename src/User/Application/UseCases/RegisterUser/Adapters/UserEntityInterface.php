<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Adapters;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\CreatedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\DeletedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\InactivatedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\UpdatedAtInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\UuidInterface;

interface UserEntityInterface
{
    public function setId(UuidInterface $id): self;

    public function setName(string $name): self;

    public function setEmail(EmailInterface $email): self;

    public function setPassword(PasswordInterface $password): self;

    public function setCreatedAt(CreatedAtInterface $createdAt): self;

    public function setUpdatedAt(UpdatedAtInterface $updatedAt): self;

    public function setDeletedAt(DeletedAtInterface $deletedAt): self;

    public function setInactivatedAt(InactivatedAtInterface $inactivatedAt): self;
}
