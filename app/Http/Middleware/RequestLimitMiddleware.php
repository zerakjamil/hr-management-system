<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class RequestLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

  $userId = auth()->id();
        $cacheKey = 'request_limit:' . $userId;

        $requestCount = Cache::get($cacheKey, 0);
        if ($requestCount >= 10) {
            return response(
                [
                    'status' => 'Request limit exceeded',
                    'message' => 'sorry limit reached'
                ],
                429);
        }

        Cache::increment($cacheKey);

        return $next($request);
}
}
