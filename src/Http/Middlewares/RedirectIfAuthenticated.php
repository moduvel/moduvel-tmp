<?php

namespace Moduvel\Core\Http\Middlewares;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard('backend')->check()) {
            return redirect(locale_route('backend.dashboard'));
        }

        return $next($request);
    }
}
