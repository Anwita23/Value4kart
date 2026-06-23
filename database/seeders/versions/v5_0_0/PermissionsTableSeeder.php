<?php

namespace Database\Seeders\versions\v5_0_0;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorOrderController@cancelInvoice')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController@cancelInvoice',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController',
                'controller_name' => 'VendorOrderController',
                'method_name' => 'cancelInvoice',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorOrderController@markAsPaid')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController@markAsPaid',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController',
                'controller_name' => 'VendorOrderController',
                'method_name' => 'markAsPaid',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\Vendor\\VendorOrderController@markAsUnpaid')->first()) {
            $permissionId = Permission::insertGetId([
                'name' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController@markAsUnpaid',
                'controller_path' => 'App\\Http\\Controllers\\Vendor\\VendorOrderController',
                'controller_name' => 'VendorOrderController',
                'method_name' => 'markAsUnpaid',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 2,
            ]);
        }
    }
}
