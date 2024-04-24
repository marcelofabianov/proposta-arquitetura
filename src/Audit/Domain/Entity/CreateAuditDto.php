<?php

declare(strict_types=1);

namespace App\Audit\Domain\Entity;

use App\Audit\Domain\Entity\Interfaces\ICreateAuditDto;
use App\Audit\Domain\Enum\ActionEnum;
use App\Core\ValueObject\ArchivedAt;
use App\Core\ValueObject\CreatedAt;
use App\Core\ValueObject\DeletedAt;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;
use App\Core\ValueObject\UpdatedAt;
use App\Core\ValueObject\Uuid;

final readonly class CreateAuditDto implements ICreateAuditDto
{
    public IUuid $id;

    public ICreatedAt $createdAt;

    public IUpdatedAt $updatedAt;

    public IArchivedAt $archivedAt;

    public IDeletedAt $deletedAt;

    public function __construct(
        public IUuid $aggregateId,
        public ActionEnum $action,
        public int $versionIncrement = 0,
        public IUuid|null $userId = null,
        public IUuid|null $eventId = null,
        IUuid|null $id = null,
        ICreatedAt|null $createdAt = null,
        IUpdatedAt|null $updatedAt = null,
        IArchivedAt|null $archivedAt = null,
        IDeletedAt|null $deletedAt = null,
    ) {
        $this->id = $id ?? Uuid::random();
        $this->createdAt = $createdAt ?? CreatedAt::now();
        $this->updatedAt = $updatedAt ?? UpdatedAt::now();
        $this->archivedAt = $archivedAt ?? ArchivedAt::nullable();
        $this->deletedAt = $deletedAt ?? DeletedAt::nullable();
    }
}
