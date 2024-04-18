<?php

declare(strict_types=1);

namespace App\Core\Entity;

use App\Core\Entity\Interfaces\IAudit;
use App\Core\ValueObject\ArchivedAt;
use App\Core\ValueObject\CreatedAt;
use App\Core\ValueObject\DeletedAt;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;
use App\Core\ValueObject\ToStringJson;
use App\Core\ValueObject\UpdatedAt;

final readonly class Audit implements IAudit
{
    use ToStringJson;

    private function __construct(
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt,
        private IUuid|null $userId,
        private IArchivedAt $archivedAt,
        private IDeletedAt $deletedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'userId' => $this->userId?->toString(),
            'createdAt' => $this->createdAt->toString(),
            'updatedAt' => $this->updatedAt->toString(),
            'archivedAt' => $this->archivedAt->toString(),
            'deletedAt' => $this->deletedAt->toString(),
        ];
    }

    /**
     * @throws \Exception
     */
    public static function create(
        ICreatedAt|null $createdAt = null,
        IUpdatedAt|null $updatedAt = null,
        IUuid|null $userId = null,
        IArchivedAt|null $archivedAt = null,
        IDeletedAt|null $deletedAt = null
    ): IAudit {
        return new self(
            $createdAt ?? CreatedAt::random(),
            $updatedAt ?? UpdatedAt::random(),
            $userId ?? null,
            $archivedAt ?? ArchivedAt::nullable(),
            $deletedAt ?? DeletedAt::nullable(),
        );
    }
}
