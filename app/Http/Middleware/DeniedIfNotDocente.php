<?php

namespace App\Http\Middleware;

use Closure;

class DeniedIfNotDocente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard= 'docentes')
    {
        if( ! \Auth::guard($guard)->check()){
            return abort(403);
        }
        return $next($request);
    }
}
