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
        $user = Auth::user();

        if (!$user) {
            // Redirige a la página de inicio de sesión si no está autenticado
            return redirect()->route("login");
        }

        if (!$user->isAdmin()) {
            //return redirect()->route('home');
            return abort(401); //retorna el error de la página
        }

        return $next($request);
    }
}