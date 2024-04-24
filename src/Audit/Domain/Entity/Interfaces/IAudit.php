<?php

declare(strict_types=1);

namespace App\Audit\Domain\Entity\Interfaces;

use App\Audit\Domain\Enum\ActionEnum;
use App\Core\IEntity;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;

interface IAudit extends IEntity
{
    public static function create(ICreateAuditDto $dto): self;

    public function getId(): IUuid;

    public function getUserId(): IUuid|null;

    public function getAggregateId(): IUuid|null;

    public function getEventId(): IUuid|null;

    public function getVersionIncrement(): int|null;

    public function getAction(): ActionEnum;

    public function getCreatedAt(): ICreatedAt;

    public function getUpdatedAt(): IUpdatedAt;

    public function getArchivedAt(): IArchivedAt;

    public function getDeletedAt(): IDeletedAt;
}
