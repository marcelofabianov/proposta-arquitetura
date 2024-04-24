<?php

declare(strict_types=1);

namespace App\User\Application\Event\Interfaces;

use App\Core\Event\IEvent;
use App\Core\ValueObject\Interfaces\IUuid;
use App\User\Domain\Entity\Interfaces\IUser;

interface IUserCreatedEvent extends IEvent
{
    public function __construct(IUuid $eventId, IUser $user);
}
