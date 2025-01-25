<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Redirect to the login page if not authenticated
            $ExceptPath = explode('/', $request->path());
            if(  $ExceptPath[0] == "company") {
                return redirect()->route('company.login.form');
            }else{
                return redirect()->route('user.loginForm');
            }
        }
        return $next($request);
    }
}
