<?php

declare(strict_types=1);

namespace App\Audit\Domain\UseCase\RegisterAudit;

use App\Audit\Domain\Entity\Audit;
use App\Audit\Domain\Entity\Interfaces\IAudit;
use App\Audit\Domain\Entity\Interfaces\ICreateAuditDto;
use App\Audit\Domain\UseCase\RegisterAudit\Interfaces\IRegisterAuditRepository;
use App\Audit\Domain\UseCase\RegisterAudit\Interfaces\IRegisterAuditUseCase;

final readonly class RegisterAuditUseCase implements IRegisterAuditUseCase
{
    public function __construct(
        private IRegisterAuditRepository $repository
    ) {
    }

    public function execute(ICreateAuditDto $dto): IAudit
    {
        $audit = Audit::create($dto);

        $this->repository->create($audit);

        return $audit;
    }
}
