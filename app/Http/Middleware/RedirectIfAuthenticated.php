<?php

namespace App\Http\Middleware;
use Redirect;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    protected $auth;
   
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next, $guard = null)
    {
        
       // We want to redirect the user to the admin panel because he/she
        // is logged in and is 
        // if(Auth::guard($guard)->check())
        // {
        //     return redirect('/');

        // }
        // return $next($request);
     if ($this->auth->user() && $this->auth->user()->is_admin==1)
     {
        return $next($request);
     }
 
     // If the user is authenticated we redirect them to the normal 
     // dashboard page or initial page. 
     if ($this->auth->check()) {
         return redirect('/');
     }
 
     // Continue with the normal cycle (the given route)
         return $next($request);

    }
    
    
}
