<?php

declare(strict_types=1);

namespace App\Audit\Infra\Database;

use App\Audit\Domain\Entity\Interfaces\IAudit;
use App\Audit\Infra\Database\Interfaces\IAuditRepository;
use App\Core\Database\Interfaces\IConnection;

final readonly class AuditRepository implements IAuditRepository
{
    private const string TABLE = 'audit';

    public function __construct(
        private IConnection $connection
    ) {
    }

    public function create(IAudit $audit): void
    {
        //
    }
}
