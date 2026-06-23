<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use App\Models\Preference;
use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $data = MenuItems::where('label', 'Inventory')->where('menu', 1)->first();

        if (! empty($data)) {
            MenuItems::where('parent', $data->id)->delete();
            $data->delete();
        }

        $preferenceExists = Preference::where('category', 'inventory_module')->first();
        if (! empty($preferenceExists)) {
            $preferenceExists->delete();
        }
        $preference = Preference::insertGetId([
            'category' => 'inventory_module',
            'field' => 'order_fulfill',
            'value' => 'default',
        ]);

        $menuId = MenuItems::insertGetId([
            'label' => 'Inventory',
            'link' => null,
            'params' => '',
            'is_default' => 0,
            'icon' => 'fas fa-table',
            'parent' => 0,
            'sort' => 7,
            'class' => null,
            'menu' => 1,
            'depth' => 0,
            'is_custom_menu' => 0,
        ]);

        \DB::table('menu_items')->insert([
            0 => [
                'label' => 'Location',
                'link' => 'inventory/location',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\LocationController@index","route_name":["location.index", "location.edit", "location.create", "location.store", "location.update", "location.destroy"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 1,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            1 => [
                'label' => 'Supplier',
                'link' => 'inventory/supplier',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\SupplierController@index","route_name":["supplier.index", "supplier.edit", "supplier.create", "supplier.store", "supplier.update", "supplier.destroy", "supplier.ledger", "supplier.payment"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 2,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            2 => [
                'label' => 'Transaction',
                'link' => 'inventory/transaction',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\InventoryController@transaction","route_name":["inventory.transaction"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 7,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            3 => [
                'label' => 'Purchase Order',
                'link' => 'inventory/purchase-order',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\PurchaseController@index","route_name":["purchase.index", "purchase.edit", "purchase.create", "purchase.store", "purchase.update", "purchase.destroy", "purchase.receive", "purchase.view"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 4,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            4 => [
                'label' => 'Stock',
                'link' => 'inventory',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\InventoryController@index","route_name":["inventory.index", "inventory.adjust"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 5,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            5 => [
                'label' => 'Transfer',
                'link' => 'inventory/transfer',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\TransferController@index","route_name":["transfer.index", "transfer.create", "transfer.edit", "transfer.receive"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 6,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            6 => [
                'label' => 'Settings',
                'link' => 'inventory/settings',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\InventoryController@settings","route_name":["inventory.settings"]}',
                'is_default' => 1,
                'icon' => null,
                'parent' => $menuId,
                'sort' => 8,
                'class' => null,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
        ]);
    }
}
