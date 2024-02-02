<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\Exceptions;

use Exception;
use Marcelofabianov\MyMoney\Domain\Core\Exceptions\Ports\DomainCoreExceptionInterface;

class DomainCoreException extends Exception implements DomainCoreExceptionInterface
{

}
