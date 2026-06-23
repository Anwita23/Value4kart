<?php

/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Kabir Ahmed <[kabir.techvill@gmail.com]>
 *
 * @created 30-11-2021
 */

namespace Modules\MenuBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Services\RoleService;
use Modules\CMS\Http\Models\Page;
use Modules\MenuBuilder\Http\Models\Menus;
use Modules\MenuBuilder\Http\Models\MenuItems;
use Modules\MenuBuilder\Http\Models\AdminMenus;

class MenuBuilderController extends Controller
{
    /**
     * Menu create
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['menuId'] = isset($request->menu) ? $request->menu : '';
        if (! empty($data['menuId'])) {
            $data['menus'] = MenuItems::menus($data['menuId']);
            $data['menuName'] = AdminMenus::select('name')->where('id', $data['menuId'])->first();
            $data['adminMenus'] = Menus::where('permission', 'LIKE', '%"menu_level":"' . $data['menuId'] . '"%')->get();
            if ($data['menuId'] == 4) { // 4 reffered to frontend page menu, We will upgrade it later
                $data['pages'] = Page::active()->get();
            }

            $data['selectedLang'] = $request->input('lang', 'en');
        } elseif (empty($data['menuId'])) {
            return redirect('/admin/menu-builder?menu=2');
        }

        $data['menulist'] = AdminMenus::when(! isActive('SaaS'), function ($q) {
            $q->where('name', '!=', 'saas vendor');
        })->select('id', 'name')->get();

        $data['permissionOptions'] = $this->getPermissionOptionsForMenu();

        $data['menuItemsFlat'] = [];
        if (! empty($data['menuId']) && isset($data['menus'])) {
            $sort = 0;
            $flatten = function ($items, $parent = 0, $depth = 0) use (&$flatten, &$data, &$sort) {
                foreach ($items as $m) {
                    // if (! $m->getModuleName()) {
                    //     dd($m);
                    //     continue;
                    // }
                    $data['menuItemsFlat'][] = [
                        'id' => (int) $m->id,
                        'label' => $m->getTranslated('label', $data['selectedLang'] ?? 'en'),
                        'link' => $m->link ?? '',
                        'parent' => (int) $parent,
                        'sort' => $sort++,
                        'depth' => (int) $depth,
                        'class' => $m->class ?? '',
                        'icon' => $m->icon ?? '',
                        'params' => $m->params ?? [],
                    ];
                    if ($m->relationLoaded('child') && $m->child->isNotEmpty()) {
                        $flatten($m->child, $m->id, $depth + 1);
                    }
                }
            };
            $flatten($data['menus']);
        }
        // dd($data['menuItemsFlat']);

        return view('menubuilder::index', $data);
    }

    /**
     * Return icon suggestions for the menu builder (AJAX).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function iconSuggestions()
    {
        $icons = moduleConfig('menubuilder.icon_suggestions', []);
        return response()->json(['icons' => array_values($icons)]);
    }

    /**
     * Build a flat list of permissions for the menu builder dropdown.
     * - Dropdown shows short label (alias or "List Users" style).
     * - Path (e.g. "Admin Panel -> Web -> Account -> Account Settings") is used only for display below the dropdown.
     * - Stored value in DB remains controller@method (value).
     *
     * @return array<int, array{value: string, label: string, path: string}>
     */
    protected function getPermissionOptionsForMenu(): array
    {
        try {
            $permissions = Permission::getAll();
            if ($permissions->isEmpty()) {
                return [];
            }
            $roleService = app(RoleService::class);
            $options = [];
            foreach ($permissions->sortBy('controller_name')->sortBy('method_name') as $p) {
                $controllerGroup = str_replace('Controller', '', $p->controller_name ?? '');
                $label = ! empty($p->alias)
                    ? $p->alias
                    : $roleService->formatMethodLabel($p->method_name ?? '', $controllerGroup);
                $options[] = [
                    'value' => $p->name,
                    'label' => $label,
                    'path'  => $p->getDisplayPath(),
                ];
            }
            return array_values($options);
        } catch (\Throwable $e) {
            return [];
        }
    }
}
