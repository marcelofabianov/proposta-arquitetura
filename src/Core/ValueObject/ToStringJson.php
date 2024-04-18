<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

use JsonException;

trait ToStringJson
{
    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * @throws JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toString(), JSON_THROW_ON_ERROR);
    }
}
