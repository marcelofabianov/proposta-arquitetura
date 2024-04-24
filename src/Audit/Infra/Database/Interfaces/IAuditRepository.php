<?php

declare(strict_types=1);

namespace App\Audit\Infra\Database\Interfaces;

use App\Audit\Domain\UseCase\RegisterAudit\Interfaces\IRegisterAuditRepository;
use App\Core\IRepository;

interface IAuditRepository extends IRepository, IRegisterAuditRepository
{
}
