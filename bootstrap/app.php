<?php

use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Middleware\FirstTimeRedirect;
use App\Http\Middleware\GuestApiMiddleware;
use App\Http\Middleware\isAdminMiddleware;
use App\Http\Middleware\isNotAdminMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isFirstUser' => FirstTimeRedirect::class,
            'api.auth' => ApiAuthMiddleware::class,
            'guest.api' => GuestApiMiddleware::class,
            'isAdmin' => isAdminMiddleware::class,
            'isNotAdmin' => isNotAdminMiddleware::class,
            'lang' => LanguageMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
