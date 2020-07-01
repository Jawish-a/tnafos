<?php

namespace App\Http\Middleware;

use Closure;

class CompanyValid
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
        if (auth()->user()->company == NULL) {
            //dd($request->route('company'));
            //dd($request->route()->parameters()) ;
            return redirect()->route('company.create');
        }
        return $next($request);
    }
}
