<?php

declare(strict_types=1);

use App\Audit\Domain\Entity\Audit;
use App\Audit\Domain\Entity\Interfaces\IAudit;
use App\Core\ValueObject\ArchivedAt;
use App\Core\ValueObject\CreatedAt;
use App\Core\ValueObject\DeletedAt;
use App\Core\ValueObject\UpdatedAt;
use App\Core\ValueObject\Uuid;

describe('Audit', function () {
    test('Deve criar uma nova instancia de Audit com dados passados', function () {
        $audit = Audit::create(
            createdAt: CreatedAt::random(),
            updatedAt: UpdatedAt::random(),
            userId: Uuid::random(),
            archivedAt: ArchivedAt::random(),
            deletedAt: DeletedAt::random()
        );

        expect($audit)->toBeInstanceOf(IAudit::class);
    });

    test('Deve criar uma nova instancia somente dados obrigatórios', function () {
        $audit = Audit::create();

        expect($audit)->toBeInstanceOf(IAudit::class);
    });

    test('Deve retornar um array com dados do Audit', function () {
        $createdAt = CreatedAt::random();
        $updatedAt = UpdatedAt::random();
        $userId = Uuid::random();
        $archivedAt = ArchivedAt::random();
        $deletedAt = DeletedAt::random();

        $audit = Audit::create(
            createdAt: $createdAt,
            updatedAt: $updatedAt,
            userId: $userId,
            archivedAt: $archivedAt,
            deletedAt: $deletedAt
        );

        $expected = [
            'userId' => $userId->toString(),
            'createdAt' => $createdAt->toString(),
            'updatedAt' => $updatedAt->toString(),
            'archivedAt' => $archivedAt->toString(),
            'deletedAt' => $deletedAt->toString(),
        ];

        expect($audit->toArray())->toBe($expected);
    });
})
    ->group('Unit', 'Core', 'Entity', 'Audit');
