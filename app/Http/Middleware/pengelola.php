<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class pengelola
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'Admin') {
            return $next($request);
        } elseif (Auth::user()->role = 'Editor') {
            return $next($request);
        } elseif (Auth::user()->role != 'Admin') {
            return redirect('login');
        }
        
        
    }
}
