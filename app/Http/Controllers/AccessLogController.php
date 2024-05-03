<?php

namespace App\Http\Controllers;

use App\Actions;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class AccessLogController extends BaseController
{
    public function index(Actions\LogsList $action): JsonResponse
    {
        return $action();
    }
}
