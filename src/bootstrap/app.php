<?php

use Application\Presentation\Middleware\ResponseMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

$application =  Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->removeFromGroup('web', ShareErrorsFromSession::class );
        $middleware->removeFromGroup('web', StartSession::class);
        $middleware->removeFromGroup('web', ValidateCsrfToken::class);
        $middleware->appendToGroup('api', ResponseMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


$applicationPath = __DIR__ . '/../Application';

return $application->useAppPath($applicationPath);
