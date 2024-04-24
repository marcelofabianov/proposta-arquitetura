<?php

declare(strict_types=1);

namespace App\Audit\Domain\UseCase\RegisterAudit\Interfaces;

use App\Audit\Domain\Entity\Interfaces\IAudit;

interface IRegisterAuditRepository
{
    public function create(IAudit $audit): void;
}
