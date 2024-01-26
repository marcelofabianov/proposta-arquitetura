<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\Domain\Core\ValueObjects\Ports;

use Marcelofabianov\Ddd\Domain\Core\ValueObjects\DatetimeValueObjectInterface;
use Marcelofabianov\Ddd\Domain\Core\ValueObjects\ValueObjectInterface;

interface UpdatedAtInterface extends DatetimeValueObjectInterface, ValueObjectInterface
{

}
