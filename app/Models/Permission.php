<?php
/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Millat <[millat.techvill@gmail.com]>
 *
 * @created 18-09-2021
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    /**
     * insert permission
     *
     * @return bool
     */
    public static function insertPermission(array $permissions)
    {
        if (self::insert($permissions)) {
            self::forgetCache();

            return true;
        }

        return false;
    }

    /**
     * auth user permissions name
     *
     * @param  int  $userId
     * @return array
     */
    public static function getAuthUserPermission($userId)
    {
        return PermissionRole::permissionNamesByRoleID(RoleUser::getRoleIDByUser($userId));
    }

    /**
     * Get human-readable permission path (e.g. "Admin Panel -> Web -> Account -> Account Settings").
     * Used in menu builder and anywhere a descriptive path is needed.
     *
     * @return string
     */
    public function getDisplayPath(): string
    {
        $config = config('permissions', []);
        $pathParts = [];

        if (! empty($this->groups)) {
            $groupsParts = explode('/', $this->groups);

            if (count($groupsParts) >= 1) {
                $groupKey = $groupsParts[0];
                $groupConfig = $config['groups'][$groupKey] ?? [];
                $pathParts[] = $groupConfig['label'] ?? ucwords(str_replace('_', ' ', $groupKey));
            }

            if (count($groupsParts) >= 2) {
                $subPanelKey = $groupsParts[1];
                $groupKey = $groupsParts[0];
                $subPanelConfig = $config['groups'][$groupKey]['sub_panels'][$subPanelKey] ?? [];
                $pathParts[] = $subPanelConfig['label'] ?? ucwords($subPanelKey);
            }

            if (count($groupsParts) >= 3) {
                $mappedName = $groupsParts[2];
                $pathParts[] = ucwords(str_replace('_', ' ', $mappedName));
            }
        }

        if (! empty($this->alias)) {
            $pathParts[] = $this->alias;
        } else {
            $methodName = $this->method_name ?? '';
            $methodLabels = $config['method_labels'] ?? [];
            $methodLabel = $methodLabels[$methodName] ?? ucwords(str_replace('_', ' ', $methodName));

            if (! empty($this->controller_name)) {
                $controllerGroup = explode('Controller', $this->controller_name)[0];
                $pluralization = $config['pluralization'] ?? [];
                $pluralMethods = $config['plural_methods'] ?? [];
                if (isset($pluralMethods) && is_array($pluralMethods) && in_array($methodName, $pluralMethods) && isset($pluralization[$controllerGroup])) {
                    $controllerGroup = $pluralization[$controllerGroup];
                }
                $pathParts[] = $methodLabel . ' ' . $controllerGroup;
            } else {
                $pathParts[] = $methodLabel;
            }
        }

        $path = implode(' -> ', $pathParts);

        return $path !== '' ? $path : ($this->name ?? '');
    }
}
