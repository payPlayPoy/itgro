<?php

namespace Application\Presentation\Middleware;

use Closure;
use Domain\Exception\ValidationException;
use Exception;
use Illuminate\Http\JsonResponse;

class ResponseMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     *
     * @return JsonResponse
     */
    public function handle($request, Closure $next): JsonResponse
    {
        $response = $next($request);

        /** @var Exception $exception*/
        $exception = $response->exception;

        if ($exception) {
            $code = $exception->getCode();
            switch ($exception) {
                case $exception instanceof ValidationException:
                   $error = $exception->getErrorList();
                   break;

               default:
                   $error = 'Internal server error';
                   $code = 500;
                   break;
           }

            return response()->json(['error' => $error], $code);
        }

        return response()->json(['data' => $response->original ?? []], $response->getStatusCode());
    }
}
