<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(auth()->user()->email == "admin@gmail.com"){

            return $next($request);

        }

        return redirect('/')->with('users', 'You are not authorized to view users.');
    }
}
