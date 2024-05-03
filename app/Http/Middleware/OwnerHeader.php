<?php

namespace App\Http\Middleware;

use Closure;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Request;

class OwnerHeader
{
    public const HEADER = 'x-owner';

    public function handle(Request $request, Closure $next)
    {
        $uuid = $request->headers->get(self::HEADER);

        if (Uuid::isValid($uuid)) {
            return $next($request);
        }

        throw new \RuntimeException(sprintf(
            '[%s] header is required.', self::HEADER
        ));
    }
}
