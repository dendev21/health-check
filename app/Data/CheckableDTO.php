<?php

declare(strict_types=1);

namespace App\Data;

readonly final class CheckableDTO implements \JsonSerializable
{
    public function __construct(
        private bool $db,
        private bool $cache,
    ) {
    }

    public function isDb(): bool
    {
        return $this->db;
    }

    public function isCache(): bool
    {
        return $this->cache;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
