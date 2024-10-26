<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToCorrectPath
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            // Redirige a la página de inicio de sesión si no está autenticado
            return redirect()->route('login');
        }

        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('dashboard');
        }

        if ($user->isCustomer()) {
            return redirect()->route('customer');
        }

        // Si no es admin ni customer, redirigir a una página por defecto
        return redirect()->route('home');
    }
}
