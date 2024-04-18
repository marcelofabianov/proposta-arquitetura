<?php

declare(strict_types=1);

namespace App\Core\Entity\Interfaces;

use App\Core\IEntity;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;

interface IAudit extends IEntity
{
    public static function create(
        ICreatedAt|null $createdAt = null,
        IUpdatedAt|null $updatedAt = null,
        IUuid|null $userId = null,
        IArchivedAt|null $archivedAt = null,
        IDeletedAt|null $deletedAt = null
    ): self;
}
