<?php

declare(strict_types=1);

namespace App\Components;

use App\Data\CheckableDTO;

readonly class HealthCheckerComponent
{
    public function __construct(
        protected RedisCheckable $redisCheckable,
        protected MysqlCheckable $mysqlCheckable,
    ) {
    }

    public function run(): CheckableDTO
    {
        return new CheckableDTO(
            db: $this->mysqlCheckable->isOk(),
            cache: $this->redisCheckable->isOk(),
        );
    }
}
