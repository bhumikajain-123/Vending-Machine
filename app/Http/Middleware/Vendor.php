<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Vendor
{
    public function handle(Request $request, Closure $next): Response
    {
        // if NOT logged in → redirect to login
        if (!session()->has('vendorLogin')) {
            return redirect('vendor/login');
        }

        // if logged in → continue request
        return $next($request);
    }
}
