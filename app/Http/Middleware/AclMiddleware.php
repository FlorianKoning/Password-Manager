<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Service\Auth\AclService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AclMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $aclService = app(AclService::class);


        // Checks if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('redirectResponse', 'You are not logged in.');
        }


        // Checks if the user has the right acl permission
        if ($aclService->middlewareAcl($request)) {
            return $next($request);
        }


        return redirect()->route('dashboard.index')->with('redirectResponse', 'You do not have permission for this action!');
    }
}
