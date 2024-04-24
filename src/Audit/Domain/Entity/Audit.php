<?php

declare(strict_types=1);

namespace App\Audit\Domain\Entity;

use App\Audit\Domain\Entity\Interfaces\IAudit;
use App\Audit\Domain\Entity\Interfaces\ICreateAuditDto;
use App\Audit\Domain\Enum\ActionEnum;
use App\Core\ValueObject\Interfaces\IArchivedAt;
use App\Core\ValueObject\Interfaces\ICreatedAt;
use App\Core\ValueObject\Interfaces\IDeletedAt;
use App\Core\ValueObject\Interfaces\IUpdatedAt;
use App\Core\ValueObject\Interfaces\IUuid;
use App\Core\ValueObject\ToStringJson;

final readonly class Audit implements IAudit
{
    use ToStringJson;

    private function __construct(
        private IUuid $id,
        private IUuid|null $userId,
        private IUuid|null $aggregateId,
        private IUuid|null $eventId,
        private int $versionIncrement,
        private ActionEnum $action,
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt,
        private IArchivedAt $archivedAt,
        private IDeletedAt $deletedAt,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'userId' => $this->userId?->toString(),
            'aggregateId' => $this->aggregateId?->toString(),
            'eventId' => $this->eventId?->toString(),
            'versionIncrement' => $this->versionIncrement,
            'action' => $this->action->value,
            'createdAt' => $this->createdAt->toString(),
            'updatedAt' => $this->updatedAt->toString(),
            'archivedAt' => $this->archivedAt->getValue(),
            'deletedAt' => $this->deletedAt->getValue(),
        ];
    }

    public function getId(): IUuid
    {
        return $this->id;
    }

    public function getUserId(): IUuid|null
    {
        return $this->userId;
    }

    public function getAggregateId(): IUuid|null
    {
        return $this->aggregateId;
    }

    public function getEventId(): IUuid|null
    {
        return $this->eventId;
    }

    public function getVersionIncrement(): int
    {
        return $this->versionIncrement;
    }

    public function getAction(): ActionEnum
    {
        return $this->action;
    }

    public function getCreatedAt(): ICreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): IUpdatedAt
    {
        return $this->updatedAt;
    }

    public function getArchivedAt(): IArchivedAt
    {
        return $this->archivedAt;
    }

    public function getDeletedAt(): IDeletedAt
    {
        return $this->deletedAt;
    }

    /**
     * @throws \Exception
     */
    public static function create(ICreateAuditDto $dto): IAudit
    {
        return new self(
            $dto->id,
            $dto->userId,
            $dto->aggregateId,
            $dto->eventId,
            $dto->versionIncrement,
            $dto->action,
            $dto->createdAt,
            $dto->updatedAt,
            $dto->archivedAt,
            $dto->deletedAt,
        );
    }
}
