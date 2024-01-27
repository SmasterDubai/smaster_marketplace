<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config; //added

class SubdomainDatabaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $subdomain = explode('.', $request->getHost())[0];

        if ($subdomain !== 'www') {
            // Assuming your subdomain naming convention matches the database connection name
            Config::set('subdomain1.default', $subdomain); //removed database.default and replaced with subdomain1
        }

        return $next($request);
    }
}
