<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            // Redirige a la página de inicio de sesión si no está autenticado
            return redirect()->route('login');
        }

        $user = auth()->user();

        if (!$user || !$user->isAdmin()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}

