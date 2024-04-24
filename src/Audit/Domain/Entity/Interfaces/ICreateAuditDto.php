<?php

declare(strict_types=1);

namespace App\Audit\Domain\Entity\Interfaces;

use App\Audit\Domain\Enum\ActionEnum;
use App\Core\IDto;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;

/**
 * Interface ICreateAuditDto
 *
 * @property-read IUuid $id
 * @property-read IUuid $aggregateId
 * @property-read ActionEnum $action
 * @property-read int $versionIncrement
 * @property-read IUuid|null $userId
 * @property-read IUuid|null $eventId
 * @property-read ICreatedAt|null $createdAt
 * @property-read IUpdatedAt|null $updatedAt
 * @property-read IArchivedAt|null $archivedAt
 * @property-read IDeletedAt|null $deletedAt
 */
interface ICreateAuditDto extends IDto
{
    public function __construct(
        IUuid $aggregateId,
        ActionEnum $action,
        int $versionIncrement = 0,
        IUuid|null $userId = null,
        IUuid|null $eventId = null,
        IUuid|null $id = null,
        ICreatedAt|null $createdAt = null,
        IUpdatedAt|null $updatedAt = null,
        IArchivedAt|null $archivedAt = null,
        IDeletedAt|null $deletedAt = null,
    );
}
