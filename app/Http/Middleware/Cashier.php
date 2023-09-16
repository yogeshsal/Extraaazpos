<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Cashier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 1) {
            return redirect()->route('admin');            
        }        

        if (Auth::user()->role == 2) {
            return redirect()->route('owner');                    
        }

        if (Auth::user()->role == 3) {            
            return $next($request);    
        }

        if (Auth::user()->role == 4) {
            return redirect()->route('manager');
        }        

        if (Auth::user()->role == 5) {
            return redirect()->route('waiter');
        }

        if (Auth::user()->role == 6) {
            return redirect()->route('kitchen');
        }
    }
}
