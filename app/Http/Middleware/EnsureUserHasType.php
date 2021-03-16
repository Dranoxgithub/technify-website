<?php

namespace App\Http\Middleware;



use Closure;

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if ($request->user() && $request->user()->type == $type) {
            return $next($request);
        } else {
            return redirect('/');
        }

    }
}
