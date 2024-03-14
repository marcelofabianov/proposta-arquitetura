<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\Entities\Ports;

use Marcelofabianov\MyMoney\Domain\Core\CoreDtoInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\CreatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\DeletedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\InactivatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\PasswordInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UpdatedAtInterface;
use Marcelofabianov\MyMoney\Domain\Core\ValueObjects\Ports\UuidInterface;

interface CreateUserDtoInterface extends CoreDtoInterface
{
    public function __construct(
        string $name,
        EmailInterface $email,
        PasswordInterface $password,
        ?UuidInterface $id = null,
        ?CreatedAtInterface $createdAt = null,
        ?UpdatedAtInterface $updatedAt = null,
        ?DeletedAtInterface $deletedAt = null,
        ?InactivatedAtInterface $inactivatedAt = null
    );
}
