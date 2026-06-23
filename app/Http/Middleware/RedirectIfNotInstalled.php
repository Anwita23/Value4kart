<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotInstalled
{
    /**
     * When the app is not installed, send visitors to the installer instead of the main app (which expects a database).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isInstalled() || $this->isInstallerRequest($request)) {
            return $next($request);
        }

        $installUrl = url('/install');

        if ($request->expectsJson()) {
            return response()->json([
                'message' => __('Application is not installed. Please complete setup at :url.', ['url' => $installUrl]),
                'install_url' => $installUrl,
            ], 503);
        }

        return redirect()->to($installUrl);
    }

    protected function isInstalled(): bool
    {
        return filter_var(config('martvill.app_install', false), FILTER_VALIDATE_BOOLEAN);
    }

    protected function isInstallerRequest(Request $request): bool
    {
        return $request->is('install', 'install/*', 'up');
    }
}
