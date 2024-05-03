<?php

namespace App\Http\Controllers;

use App\Actions;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Routing\Controller as BaseController;

class HealthCheckController extends BaseController
{
    public function index(Actions\HeathCheck $action, Request $request): JsonResponse
    {
        return $action($request);
    }
}
