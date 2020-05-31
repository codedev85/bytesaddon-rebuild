<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Carbon\Carbon;

class LastSeen
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
        if(Auth::check()){

            User::where('id',Auth::user()->id)->update([
                'last_seen'=> Carbon::now(),
            ]);
        }
        return $next($request);
    }
}
