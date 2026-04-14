<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        apiPrefix: 'api',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api_debug.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Excluir rutas API del CSRF para permitir requests desde n8n
        $middleware->validateCsrfTokens(except: [
            'api/*',
        ]);

        // Redirigir usuarios autenticados a profile en lugar de dashboard
        $middleware->redirectGuestsTo('/login');
        $middleware->redirectUsersTo('/profile');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
