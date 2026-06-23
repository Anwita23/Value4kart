<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V4_1_0;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@findCustomerByVendor')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@findCustomerByVendor',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'findCustomerByVendor',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@findLocation')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@findLocation',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController',
                'controller_name' => 'PurchaseController',
                'method_name' => 'findLocation',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\AdminOrderController@invoiceTaxShipping')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\AdminOrderController@invoiceTaxShipping',
                'controller_path' => 'App\\Http\\Controllers\\AdminOrderController',
                'controller_name' => 'AdminOrderController',
                'method_name' => 'invoiceTaxShipping',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorOrderController@userAddress')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController@userAddress',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController',
                'controller_name' => 'VendorOrderController',
                'method_name' => 'userAddress',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\ProductController@search')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\ProductController@search',
                'controller_path' => 'App\\Http\\Controllers\\ProductController',
                'controller_name' => 'ProductController',
                'method_name' => 'search',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\AdminOrderController@invoiceSave')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\AdminOrderController@invoiceSave',
                'controller_path' => 'App\\Http\\Controllers\\AdminOrderController',
                'controller_name' => 'AdminOrderController',
                'method_name' => 'invoiceSave',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\AdminOrderController@partialPayment')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\AdminOrderController@partialPayment',
                'controller_path' => 'App\\Http\\Controllers\\AdminOrderController',
                'controller_name' => 'AdminOrderController',
                'method_name' => 'partialPayment',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorOrderController@edit')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController@edit',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController',
                'controller_name' => 'VendorOrderController',
                'method_name' => 'edit',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! $permission = Permission::where('name', 'App\\Http\\Controllers\\AdminOrderController@update')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\AdminOrderController@update',
                'controller_path' => 'App\\Http\\Controllers\\AdminOrderController',
                'controller_name' => 'AdminOrderController',
                'method_name' => 'update',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        } elseif (! PermissionRole::where('permission_id', $permission->id)->where('role_id', 2)->first()) {
            PermissionRole::insert([
                'permission_id' => $permission->id,
                'role_id' => 2,
            ]);
        }

        $chatPermissions = [
            'Modules\\Ticket\\Http\\Controllers\\ChatController@getConversations',
            'Modules\\Ticket\\Http\\Controllers\\ChatController@sendProductDetails',
            'Modules\\Ticket\\Http\\Controllers\\ChatController@initiateChatWithVendor',
            'Modules\\Ticket\\Http\\Controllers\\ChatController@storeMessage',
            'Modules\\Ticket\\Http\\Controllers\\ChatController@createChat',
            'Modules\\Ticket\\Http\\Controllers\\ChatController@inboxRefresh',
        ];

        $roleIds = [2, 3];

        // Fetch all permissions in one query
        $permissions = Permission::whereIn('name', $chatPermissions)->pluck('id', 'name');

        // Prepare bulk insert
        $rowsToInsert = [];

        foreach ($permissions as $permissionName => $permissionId) {
            foreach ($roleIds as $roleId) {
                $exists = PermissionRole::where('permission_id', $permissionId)
                    ->where('role_id', $roleId)
                    ->exists();

                if (! $exists) {
                    $rowsToInsert[] = [
                        'permission_id' => $permissionId,
                        'role_id'       => $roleId,
                    ];
                }
            }
        }

        // Insert all missing rows in one go
        if (! empty($rowsToInsert)) {
            PermissionRole::insert($rowsToInsert);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@ledger')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@ledger',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'ledger',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\UnitController@index')->first()) {
            Permission::insert([
                'name' => 'App\\Http\\Controllers\\UnitController@index',
                'controller_path' => 'App\\Http\\Controllers\\UnitController',
                'controller_name' => 'UnitController',
                'method_name' => 'index',
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\UnitController@store')->first()) {
            Permission::insert([
                'name' => 'App\\Http\\Controllers\\UnitController@store',
                'controller_path' => 'App\\Http\\Controllers\\UnitController',
                'controller_name' => 'UnitController',
                'method_name' => 'store',
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\UnitController@update')->first()) {
            Permission::insert([
                'name' => 'App\\Http\\Controllers\\UnitController@update',
                'controller_path' => 'App\\Http\\Controllers\\UnitController',
                'controller_name' => 'UnitController',
                'method_name' => 'update',
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\UnitController@destroy')->first()) {
            Permission::insert([
                'name' => 'App\\Http\\Controllers\\UnitController@destroy',
                'controller_path' => 'App\\Http\\Controllers\\UnitController',
                'controller_name' => 'UnitController',
                'method_name' => 'destroy',
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@index')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@index',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController',
                'controller_name' => 'CustomerAddressController',
                'method_name' => 'index',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@create')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@create',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController',
                'controller_name' => 'CustomerAddressController',
                'method_name' => 'create',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@store')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@store',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController',
                'controller_name' => 'CustomerAddressController',
                'method_name' => 'store',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@edit')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@edit',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController',
                'controller_name' => 'CustomerAddressController',
                'method_name' => 'edit',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@update')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@update',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController',
                'controller_name' => 'CustomerAddressController',
                'method_name' => 'update',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@destroy')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController@destroy',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerAddressController',
                'controller_name' => 'CustomerAddressController',
                'method_name' => 'destroy',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@edit')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@edit',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'edit',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@destroy')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@destroy',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'destroy',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@findUser')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@findUser',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'findUser',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@payment')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@payment',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'payment',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\CustomerController@paymentStore')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\CustomerController@paymentStore',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\CustomerController',
                'controller_name' => 'CustomerController',
                'method_name' => 'paymentStore',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@view')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@view',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController',
                'controller_name' => 'PurchaseController',
                'method_name' => 'view',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@print')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@print',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController',
                'controller_name' => 'PurchaseController',
                'method_name' => 'print',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@payment')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController@payment',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\PurchaseController',
                'controller_name' => 'PurchaseController',
                'method_name' => 'payment',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController@ledger')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController@ledger',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController',
                'controller_name' => 'SupplierController',
                'method_name' => 'ledger',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController@payment')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController@payment',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController',
                'controller_name' => 'SupplierController',
                'method_name' => 'payment',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController@paymentStore')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController@paymentStore',
                'controller_path' => 'Modules\\Inventory\\Http\\Controllers\\Vendor\\SupplierController',
                'controller_name' => 'SupplierController',
                'method_name' => 'paymentStore',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        // TerminalController resetPin
        if (! Permission::where('name', 'Modules\\Pos\\Http\\Controllers\\Vendor\\TerminalController@resetPin')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Pos\\Http\\Controllers\\Vendor\\TerminalController@resetPin',
                'controller_path' => 'Modules\\Pos\\Http\\Controllers\\Vendor\\TerminalController',
                'controller_name' => 'TerminalController',
                'method_name' => 'resetPin',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        // Email/Phone Change OTP
        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorController@sendChangeOtp')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorController@sendChangeOtp',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorController',
                'controller_name' => 'VendorController',
                'method_name' => 'sendChangeOtp',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorController@verifyChangeOtp')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorController@verifyChangeOtp',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorController',
                'controller_name' => 'VendorController',
                'method_name' => 'verifyChangeOtp',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorController@resendChangeOtp')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorController@resendChangeOtp',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorController',
                'controller_name' => 'VendorController',
                'method_name' => 'resendChangeOtp',
            ]);
            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }
    }
}
