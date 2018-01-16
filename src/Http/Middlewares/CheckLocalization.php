<?php

namespace Moduvel\Core\Http\Middlewares;

use Closure;

class CheckLocalization
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
        $locale = \Request::segment(1);

        if ( ! in_array($locale, locales())) {
            abort(404);
        }

        app()->setLocale($locale);

        return $next($request);
    }
}