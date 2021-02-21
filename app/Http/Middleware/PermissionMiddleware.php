<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {

        $permissions = explode('|', $permission);
        foreach ($permissions as $perm) {

            if ($request->user()->can($perm)) {
                return $next($request);
            }
        }
        abort(404);

    }
}
