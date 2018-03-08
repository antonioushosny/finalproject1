<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Session;
use Closure;

class RedirectIfNotAdmin
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
        
        if (  Auth::user()->is_admin !=1 )
        {
            //dd(Auth::check());
            return redirect('/');
            
            
       
        }
        
        return $next($request);
 



        

    }




}


