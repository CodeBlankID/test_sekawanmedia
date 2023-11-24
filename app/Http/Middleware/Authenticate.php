<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {

        if (!Auth::check() && $request->path() != "/")
        {
            return redirect("/");
        }
        elseif (Auth::check() && $request->path() == "/")
        {
            return redirect("dashboard");
        }
        return $next($request);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('/');
    }
}
