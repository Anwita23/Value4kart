<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == 'user' && Auth::guard('user')->check()) {
            if ($request->is('admin') || $request->is('admin/login')) {
                Auth::guard('user')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                try {
                    $ckname = explode('_', Auth::getRecallerName())[2] ?? null;
                    if ($ckname) {
                        \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget($ckname));
                    }
                } catch (\Exception $e) {
                    // Ignore errors if RecallerName cannot be resolved
                }
                
                $response = redirect('/admin/login');
                if ($response instanceof \Symfony\Component\HttpFoundation\Response) {
                    $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
                    $response->headers->set('Pragma', 'no-cache');
                    $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
                }
                return $response;
            }

            if (Auth::user()->role()->type == 'admin') {
                return redirect()->intended(route('dashboard'));
            } elseif (Auth::user()->role()->type == 'vendor') {
                return redirect()->intended(route('vendor-dashboard'));
            }
        }

        $response = $next($request);

        if ($response instanceof \Symfony\Component\HttpFoundation\Response) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
        }

        return $response;
    }
}
