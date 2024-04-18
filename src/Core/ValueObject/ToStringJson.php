<?php

declare(strict_types=1);

namespace App\Core\ValueObject;

trait ToStringJson
{
    /**
     * @throws \JsonException
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * @throws \JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
