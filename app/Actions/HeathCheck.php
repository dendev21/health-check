<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\AccessLog;
use App\Data\CheckableDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Middleware\OwnerHeader;
use App\Components\HealthCheckerComponent;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

readonly final class HeathCheck
{
    public function __construct(
        private ResponseFactory $response,
        private HealthCheckerComponent $healthCheckerComponent,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->log($request);
        $dto = $this->healthCheckerComponent->run();

        return $this->response->json($dto, $this->resolveStatus($dto));
    }

    private function resolveStatus(CheckableDTO $DTO): int
    {
        return $DTO->isCache() && $DTO->isDb() ? BaseResponse::HTTP_OK : BaseResponse::HTTP_INTERNAL_SERVER_ERROR;
    }

    private function log(Request $request): void
    {
        $model = new AccessLog();
        $model->setOwner($request->headers->get(OwnerHeader::HEADER));
        $model->save();
    }
}
