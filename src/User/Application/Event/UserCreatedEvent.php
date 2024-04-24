<?php

declare(strict_types=1);

namespace App\User\Application\Event;

use App\Core\ValueObject\Interfaces\IUuid;
use App\User\Application\Event\Interfaces\IUserCreatedEvent;
use App\User\Domain\Entity\Interfaces\IUser;

final readonly class UserCreatedEvent implements IUserCreatedEvent
{
    private string $eventName;

    public function __construct(
        private IUuid $eventId,
        private IUser $user
    ) {
        $this->eventName = 'user_created';
    }

    public function getEventId(): IUuid
    {
        return $this->eventId;
    }

    public function getAggregateId(): IUuid
    {
        return $this->user->getId();
    }

    public function getName(): string
    {
        return $this->eventName;
    }

    public function getPayload(): array
    {
        return ['user' => $this->user];
    }

    public function getTimestamp(): int
    {
        return time();
    }
}
