<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // Usuário autenticado, permitir acesso à rota
            return $next($request);
        }

        // Usuário não autenticado, redirecionar para a página de login
        return redirect()->route('login');
    }
}
