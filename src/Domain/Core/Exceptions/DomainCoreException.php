<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\Exceptions;

use Exception;
use Marcelofabianov\Ddd\Domain\Core\Exceptions\Ports\DomainCoreExceptionInterface;

class DomainCoreException extends Exception implements DomainCoreExceptionInterface
{

}
