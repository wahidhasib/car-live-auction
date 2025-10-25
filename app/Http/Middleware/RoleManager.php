<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authRole = Auth::user()->role;

        switch ($role) {
            case 'admin':
                if ($authRole !== 'admin') {
                    return redirect()->route('home')->with(['error' => 'Access Denied!']);
                }
                break;

            case 'user':
                if ($authRole !== "user") {
                    return redirect()->route('home')->with(['error' => 'Access Denied! Users only.']);
                }
                break;

            default:
                return redirect()->route('login')->with(['error' => 'Unauthorized Access!']);
        }

        return $next($request);
    }
}
