<?php

namespace Botble\AgeCheck\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeCheckMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('admin/*') || $request->is('api/*') || app()->runningInConsole()) {
            return $next($request);
        }

        if (
            $request->is('age-check/submit') ||
            $request->ajax() ||
            $request->is('storage/*') ||
            $request->is('vendor/*') ||
            $request->is('assets/*')
        ) {
            return $next($request);
        }

        if (session('is_18_or_over') === true) {
            return $next($request);
        }

        session(['url.intended' => $request->fullUrl()]);

        return $next($request);
    }
}
