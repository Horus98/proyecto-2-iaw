<?php

namespace App\Http\Middleware;

use Closure;

class EmpleadoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && ($request->user()->rol != "Administrador") &&($request->user()->rol != "Empleado") ){
            return new Response(view("unauthorized")->with("role", "ADMIN O EMPLEADO"));
        }

        return $next($request);
    }
}
