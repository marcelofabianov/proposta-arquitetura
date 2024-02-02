<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\Exceptions;

use Marcelofabianov\MyMoney\Domain\Core\Exceptions\DomainEntityCoreException;
use Marcelofabianov\MyMoney\Domain\User\Exceptions\Ports\DomainUserEntityExceptionInterface;

final class DomainUserEntityException extends DomainEntityCoreException implements DomainUserEntityExceptionInterface
{

}
