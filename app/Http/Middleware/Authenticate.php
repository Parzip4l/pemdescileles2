<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
            $response->header('Content-Security-Policy', "frame-ancestors 'self'");
        }

        return redirect('/login'); // Ganti "/login" dengan URL halaman login di aplikasi Anda.
    }
}
