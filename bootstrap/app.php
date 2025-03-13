<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'apikey.auth' => \App\Http\Middleware\ApiKeyAuth::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e) {
            if (request()->is('api/*')) {
                if ($e instanceof ValidationException) {
                    return response()->json(['errors' => $e->errors()], 422);
                }

                if ($e instanceof AuthenticationException) {
                    return response()->json(['message' => 'Unauthenticated.'], 401);
                }

                if ($e instanceof AuthorizationException) {
                    return response()->json(['message' => 'Unauthorized.'], 403);
                }

                if ($e instanceof ModelNotFoundException) {
                    $modelName = class_basename($e->getModel());
                    return response()->json(['message' => $modelName . ' not found.'], 404);
                }

                if ($e instanceof HttpException) {
                    return response()->json(['message' => $e->getMessage()], $e->getStatusCode());
                }

                if ($e instanceof MethodNotAllowedHttpException) { // Handle MethodNotAllowedHttpException
                    return response()->json(['message' => 'Method not allowed.'], 405);
                }

                if ($e instanceof NotFoundHttpException) {
                    return response()->json(['message' => 'Not Found'], 404);
                }

                return response()->json([
                    'message' => $e->getMessage(),
                    'exception' => get_class($e),
                    'trace' => $e->getTrace(), // Consider removing this in production
                ], 500); // Use 500 for general server errors
            }
    });
        //
    })->create();
