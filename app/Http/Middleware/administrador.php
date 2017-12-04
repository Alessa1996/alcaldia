<?php

namespace App\Http\Middleware;

use Closure;

class administrador
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
        $usuario_actual=\Auth::User();
        if ($usuario_actual->tipo_idtipo!=1) {
               Flash::error('alert-danger', 'No tienes permiso para esta acción');
          
          return redirect()->back();
          }  
        return $next($request);
    }
}
