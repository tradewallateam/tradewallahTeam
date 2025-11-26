<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth.check' => App\Http\Middleware\AuthMiddleware::class,
            'clear.cache' => App\Http\Middleware\ClearCacheMiddleware::class,
            'frontend.data' => App\Http\Middleware\FrontendDataMiddleware::class,
            'member.auth' => App\Http\Middleware\MemberAuthMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
