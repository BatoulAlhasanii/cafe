<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setlocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $segment = $request->segment(1);
        if (!in_array($segment, config('app.available_locales'))) {
            $segments = $request->segments();
            $fallback = session('locale') ?: config('app.fallback_locale');
            array_unshift($segments, $fallback);
            return redirect()->to(implode('/', $segments));
        }

        session(['locale' => $segment]);
        app()->setLocale($segment);

        return $next($request);
    }
}
