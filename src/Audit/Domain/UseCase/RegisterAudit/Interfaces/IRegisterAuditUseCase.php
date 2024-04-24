<?php

declare(strict_types=1);

namespace App\Audit\Domain\UseCase\RegisterAudit\Interfaces;

use App\Audit\Domain\Entity\Interfaces\IAudit;
use App\Audit\Domain\Entity\Interfaces\ICreateAuditDto;

interface IRegisterAuditUseCase
{
    public function __construct(IRegisterAuditRepository $repository);

    public function execute(ICreateAuditDto $dto): IAudit;
}
