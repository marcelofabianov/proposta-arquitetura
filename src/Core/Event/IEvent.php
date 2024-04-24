<?php

declare(strict_types=1);

namespace App\Core\Event;

use App\Core\ValueObject\Interfaces\IUuid;

interface IEvent
{
    public function getEventId(): IUuid;

    public function getAggregateId(): IUuid;

    public function getName(): string;

    public function getPayload(): array;

    public function getTimestamp(): int;
}
