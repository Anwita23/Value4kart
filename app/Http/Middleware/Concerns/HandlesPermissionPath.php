<?php

/**
 * Trait for handling permission path generation
 *
 * @author TechVillage <support@techvill.org>
 */

namespace App\Http\Middleware\Concerns;

use App\Models\Permission as PermissionModel;

trait HandlesPermissionPath
{
    /**
     * Get descriptive permission path from route
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function getPermissionPath($request)
    {
        try {
            $route = $request->route();
            if (! $route) {
                return null;
            }

            $actionName = $route->getActionName();
            if (! $actionName || ! is_string($actionName)) {
                return null;
            }

            // Find permission by name (controller@method)
            if (isset($actionName[0]) && $actionName[0] === '\\') {
                $actionName = substr($actionName, 1);
            }
            $permission = PermissionModel::where('name', $actionName)->first();
            if (! $permission) {
                return null;
            }

            return $permission->getDisplayPath();
        } catch (\Exception $e) {
            // Return null if any error occurs
            return null;
        }
    }
}
