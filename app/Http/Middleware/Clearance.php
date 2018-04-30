<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        /**
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);
        */

        // Compare request and resource with available permissions
        $path = explode('/', $request->path());

        dd($path);

        return $next($request);
    }
}
