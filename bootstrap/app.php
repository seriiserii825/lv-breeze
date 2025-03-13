<?php
use Illuminate\Auth\AuthenticationException;
use App\Http\Middleware\CheckRoleMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'check_role' => CheckRoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle unauthenticated exceptions
        $exceptions->render(function (AuthenticationException $e, Request $request): Response {
            $guard = $e->guards()[0] ?? null;

            $loginRoute = match ($guard) {
                'admin' => route('admin.login'),
                default => route('login'),
            };

            return redirect()->guest($loginRoute);
        });       //
    })->create();
