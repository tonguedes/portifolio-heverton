<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Render (and most PaaS hosts) terminate TLS at their edge proxy and
        // forward plain HTTP to the container, so trust that proxy's
        // X-Forwarded-* headers — otherwise Laravel thinks every request is
        // HTTP and generates http:// asset URLs, which browsers block as
        // mixed content on an https:// page.
        $middleware->trustProxies(at: '*');

        $middleware->encryptCookies(except: ['portfolio']);
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
