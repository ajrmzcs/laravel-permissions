<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class Clearance
{
    // Check Roles and permissions for each route

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Super Admin has access all over the app
        if (Auth::user()->hasRole('super-admin'))
        {
            return $next($request);
        }

        // Compare request and resource with available permissions
        $permission = $request->route()->getName() ?? null;

        if (!Auth::user()->hasPermissionTo($permission)) {

            throw new UnauthorizedException(403,"You don\'t permission to perform this action");

        }



        return $next($request);
    }
}
