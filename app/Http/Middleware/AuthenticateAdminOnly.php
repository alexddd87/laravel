<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminOnly {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next, $guard = null)
    {
        if(!Auth::check()){
            return redirect()->route('admin-login')->withErrors('You are not logged in');
        }elseif ($request->user()->admin != 1){

            return redirect()->route('admin-login')->withErrors('You have not authority');
        }
        return $next($request);
    }

}