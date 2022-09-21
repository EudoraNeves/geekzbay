<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate
{

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // return route('login');
            $loginRequiredMsg = 'Please log in first!';
            return response()->view('auth.login', ['loginRequiredMsg'=>$loginRequiredMsg, 'isNewRegister' => false]);
        }
        return $next($request);
    }
    
}
