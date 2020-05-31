<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
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
        if(Auth::user()->role_id > 2){

            alert()->warning('You dont have permission to access the resource ', 'Warming')->autoclose(5000);
            return redirect('/');

        }
        return $next($request);
    }
}
