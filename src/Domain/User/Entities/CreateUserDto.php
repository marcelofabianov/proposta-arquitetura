<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\Entities;

use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\CreatedAt;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\DeletedAt;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\InactivatedAt;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\CreatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\DeletedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\InactivatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UpdatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UuidInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\UpdatedAt;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Uuid;
use Marcelofabianov\MyMoney\Domain\User\Entities\Ports\CreateUserDtoInterface;
use Marcelofabianov\MyMoney\Shared\Services\Uuid\UuidGenerate;

final readonly class CreateUserDto implements CreateUserDtoInterface
{
    public UuidInterface $id;

    public CreatedAtInterface $createdAt;

    public UpdatedAtInterface $updatedAt;

    public DeletedAtInterface $deletedAt;

    public InactivatedAtInterface $inactivatedAt;

    public function __construct(
        public string $name,
        public EmailInterface $email,
        public PasswordInterface $password,
        ?UuidInterface $id = null,
        ?CreatedAtInterface $createdAt = null,
        ?UpdatedAtInterface $updatedAt = null,
        ?DeletedAtInterface $deletedAt = null,
        ?InactivatedAtInterface $inactivatedAt = null
    )
    {
        $this->id = $id ?? Uuid::random(new UuidGenerate());
        $this->createdAt = $createdAt ?? CreatedAt::now();
        $this->updatedAt = $updatedAt ?? UpdatedAt::now();
        $this->deletedAt = $deletedAt ?? DeletedAt::nullable();
        $this->inactivatedAt = $inactivatedAt ?? InactivatedAt::nullable();
    }
}
