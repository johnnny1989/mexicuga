<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AccessorMiddleware
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
        if (Auth::check()){
            if($request->user()->usertype === 'user'){
                return redirect('/mi-perfil'); 
            }elseif($request->user()->usertype === 'operator'){
                return redirect('/admin'); 
            }
        }
        return $next($request);
    }
}
