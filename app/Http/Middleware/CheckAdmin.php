<?php

namespace App\Http\Middleware;

use Closure;

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
        $role = auth()->user()->role;
        if( $role == 1 || $role == 0){
            return $next($request);
        }

        // return redirect('home')->with('error',"Only admin can access!");
        abort(401);
    }
}
