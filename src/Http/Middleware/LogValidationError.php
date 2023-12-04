<?php

namespace IcarusMedia\ValidationErrorLogger\Http\Middleware;

use Closure;
use Exception;
use IcarusMedia\ValidationErrorLogger\Models\ValidationErrorLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogValidationError
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        if ($response->getStatusCode() !== Response::HTTP_UNPROCESSABLE_ENTITY) {
            return;
        }

        try {
            ValidationErrorLog::forceCreate([
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'request' => $request->all(),
                'response' => $response->getContent(),
            ]);
        } catch (Exception $e) {
            if (function_exists('report')) {
                report($e);
            }
        }
    }
}
