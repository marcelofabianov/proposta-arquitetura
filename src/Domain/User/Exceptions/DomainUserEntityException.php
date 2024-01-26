<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\User\Exceptions;

use Marcelofabianov\Ddd\Domain\Core\Exceptions\DomainEntityCoreException;
use Marcelofabianov\Ddd\Domain\User\Exceptions\Ports\DomainUserEntityExceptionInterface;

final class DomainUserEntityException extends DomainEntityCoreException implements DomainUserEntityExceptionInterface
{

}
