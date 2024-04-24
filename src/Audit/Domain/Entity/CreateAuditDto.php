<?php

declare(strict_types=1);

namespace App\Audit\Domain\Entity;

use App\Audit\Domain\Entity\Interfaces\ICreateAuditDto;
use App\Audit\Domain\Enum\ActionEnum;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;

final readonly class CreateAuditDto implements ICreateAuditDto
{
    public function __construct(
        public IUuid $id,
        public IUuid $aggregateId,
        public ActionEnum $action,
        public int $versionIncrement = 0,
        public IUuid|null $userId = null,
        public IUuid|null $eventId = null,
        public ICreatedAt|null $createdAt = null,
        public IUpdatedAt|null $updatedAt = null,
        public IArchivedAt|null $archivedAt = null,
        public IDeletedAt|null $deletedAt = null,
    ) {
    }
}
