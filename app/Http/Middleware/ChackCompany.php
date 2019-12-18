<?php

namespace App\Http\Middleware;

use Closure;

class ChackCompany
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
        if (auth()->user()->company != $request->route('company')) {
            //dd($request->route('company'));
            //dd($request->route()->parameters()) ;
            return redirect()->back();
        }
        return $next($request);
    }
}
