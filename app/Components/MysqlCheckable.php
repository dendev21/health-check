<?php

declare(strict_types=1);

namespace App\Components;

use Illuminate\Database\DatabaseManager;

final class MysqlCheckable implements CheckableInterface
{
    private const CONNECTION = 'mysql';

    public function __construct(
        private readonly DatabaseManager $databaseManager
    ) {
    }

    public function isOk(): bool
    {
        try {
            $this->databaseManager->connection(self::CONNECTION)->getPdo();
        } catch (\Throwable $e) {
            return false;
        }

        return true;
    }
}
