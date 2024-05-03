<?php

declare(strict_types=1);

namespace App\Components;

use Predis\Response\Status;
use Illuminate\Redis\RedisManager;

final class RedisCheckable implements CheckableInterface
{
    private const CONNECTION = 'default';
    private const SUCCESS_RESPONSE = 'PONG';

    public function __construct(
        private readonly RedisManager $redis
    ) {
    }

    public function isOk(): bool
    {
        try {
            /** @var Status $status */
            $status = $this->redis->connection(self::CONNECTION)->ping();
        } catch (\Throwable $e) {
            return false;
        }

        return $status->getPayload() === self::SUCCESS_RESPONSE;
    }
}
