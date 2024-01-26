<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Ports;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\EmailInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports\PasswordInterface;

/**
 * @property-read string $name
 * @property-read EmailInterface $email
 * @property-read PasswordInterface $password
 */
interface RegisterUserDtoInterface
{
    public function __construct(
        string $name,
        EmailInterface $email,
        PasswordInterface $password
    );
}
