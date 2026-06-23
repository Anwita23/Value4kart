<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\vendor;

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
        
        $data = MenuItems::where('label', 'Inventory')->where('menu', 3)->first();
        
        if (!empty($data)) {
            MenuItems::where('parent', $data->id)->delete();
            $data->delete();
        }
        

        $menuId = MenuItems::insertGetId([
            'label' => 'Inventory',
            'link' => NULL,
            'params' => '',
            'is_default' => 0,
            'icon' => 'fas fa-table',
            'parent' => 0,
            'sort' => 2,
            'class' => NULL,
            'menu' => 3,
            'depth' => 0,
            'is_custom_menu' => 0,
        ]);
        
        

    \DB::table('menu_items')->insert(array (
        0 =>
        array (
            'label' => 'Location',
            'link' => 'inventory/location',
            'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\LocationController@index","route_name":["vendor.location.index", "vendor.location.edit", "vendor.location.create", "vendor.location.store", "vendor.location.update", "vendor.location.destroy"]}',
            'is_default' => 1,
            'icon' => NULL,
            'parent' => $menuId,
            'sort' => 2,
            'class' => NULL,
            'menu' => 3,
            'depth' => 1,
            'is_custom_menu' => 0,
        ),
        1 =>
            array (
                'label' => 'Supplier',
                'link' => 'inventory/supplier',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\SupplierController@index","route_name":["vendor.supplier.index", "vendor.supplier.edit", "vendor.supplier.create", "vendor.supplier.store", "vendor.supplier.update", "vendor.supplier.destroy"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => $menuId,
                'sort' => 2,
                'class' => NULL,
                'menu' => 3,
                'depth' => 1,
                'is_custom_menu' => 0,
            ),
        2 =>
            array (
                'label' => 'Transaction',
                'link' => 'inventory/transaction',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\InventoryController@transaction","route_name":["vendor.inventory.transaction"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => $menuId,
                'sort' => 7,
                'class' => NULL,
                'menu' => 3,
                'depth' => 1,
                'is_custom_menu' => 0,
            ),
        3 =>
            array (
                'label' => 'Purchase Order',
                'link' => 'inventory/purchase-order',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\PurchaseController@index","route_name":["vendor.purchase.index", "vendor.purchase.edit", "vendor.purchase.create", "vendor.purchase.store", "vendor.purchase.update", "vendor.purchase.destroy", "vendor.purchase.receive", "vendor.purchase.view"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => $menuId,
                'sort' => 4,
                'class' => NULL,
                'menu' => 3,
                'depth' => 1,
                'is_custom_menu' => 0,
            ),
        4 =>
            array (
                'label' => 'Stock',
                'link' => 'inventory',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\InventoryController@index","route_name":["vendor.inventory.index", "vendor.inventory.adjust"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => $menuId,
                'sort' => 5,
                'class' => NULL,
                'menu' => 3,
                'depth' => 1,
                'is_custom_menu' => 0,
            ),
        5 =>
            array (
                'label' => 'Transfer',
                'link' => 'inventory/transfer',
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\TransferController@index","route_name":["vendor.transfer.index", "vendor.transfer.create", "vendor.transfer.edit", "vendor.transfer.receive"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => $menuId,
                'sort' => 6,
                'class' => NULL,
                'menu' => 3,
                'depth' => 1,
                'is_custom_menu' => 0,
            )
        ));

        foreach ([3, 6] as $menuId) {
            MenuItems::where([
                'link' => 'inventory/supplier',
                'menu' => $menuId,
            ])->update([
                'params' => '{"permission":"Modules\\\\Inventory\\\\Http\\\\Controllers\\\\Vendor\\\\SupplierController@index","route_name":["vendor.supplier.index", "vendor.supplier.edit", "vendor.supplier.create", "vendor.supplier.store", "vendor.supplier.update", "vendor.supplier.destroy", "vendor.supplier.ledger", "vendor.supplier.payment"]}',
            ]);
        }
    }
}
