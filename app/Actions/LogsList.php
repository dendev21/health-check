<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\AccessLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Routing\ResponseFactory;

readonly final class LogsList
{
    public function __construct(
        private ResponseFactory $response,
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $models = AccessLog::query()->orderByDesc(AccessLog::CREATED_AT)->get();

        return $this->response->json($models);
    }
}
