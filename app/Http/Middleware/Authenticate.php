<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Logout Inactive user.
     *
     * @return void
     */
    public function __construct(Factory $auth)
    {
        parent::__construct($auth);

        $user = auth()->user();
        if (empty($user)) {
            return;
        }

        if ($user->status != 'Active') {
            if (Auth::guard('api')->check()) {
                Auth::guard('api')->user()->token()->delete();
            } else {
                return \Redirect::to(route('users.logout'))->send();
            }
        }

        if (Request()->is('vendor/*')) {

            if (
                ($user->roles->first()->type == 'vendor' && empty($vendor = $user->vendors()->first())) ||
                (! empty($vendor = $user->vendors()->first()) && $vendor->status != 'Active')
            ) {

                if (str_contains(url()->previous(), '/admin') && session('impersonator')) {

                    return redirect()->route('impersonator-cancel');
                }

                if (isActive('SaaS')) {
                    return \Redirect::to(route('users.logout'))->send();
                }

                \Session::flash('fail', __('Your seller account is not activate yet. Please contact with site administrator.'));

                return \Redirect::to(route('site.index'))->send();
            }
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, \Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        $response = $next($request);

        if ($response instanceof \Symfony\Component\HttpFoundation\Response) {
            $response->headers->set('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
        }

        return $response;
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin/*') || $request->is('admin')) {
                return url('/admin/login');
            }
            return route('login');
        }
    }
}
