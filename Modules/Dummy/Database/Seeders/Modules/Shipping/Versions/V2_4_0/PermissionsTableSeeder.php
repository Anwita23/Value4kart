<?php

namespace Modules\Dummy\Database\Seeders\Modules\Shipping\Versions\V2_4_0;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        if (! Permission::where('name', 'Modules\\Shipping\\Http\\Controllers\\ShippingController@updateProvider')->first()) {
            Permission::insert([
                'name' => 'Modules\\Shipping\\Http\\Controllers\\ShippingController@updateProvider',
                'controller_path' => 'Modules\\Shipping\\Http\\Controllers\\ShippingController',
                'controller_name' => 'ShippingController',
                'method_name' => 'updateProvider',
            ]);
        }

        if (! Permission::where('name', 'Modules\\Shipping\\Http\\Controllers\\ShippingController@removeProvider')->first()) {
            Permission::insert([
                'name' => 'Modules\\Shipping\\Http\\Controllers\\ShippingController@removeProvider',
                'controller_path' => 'Modules\\Shipping\\Http\\Controllers\\ShippingController',
                'controller_name' => 'ShippingController',
                'method_name' => 'removeProvider',
            ]);
        }

        if (! Permission::where('name', 'Modules\\Shipping\\Http\\Controllers\\ShippingController@storeProvider')->first()) {
            Permission::insert([
                'name' => 'Modules\\Shipping\\Http\\Controllers\\ShippingController@storeProvider',
                'controller_path' => 'Modules\\Shipping\\Http\\Controllers\\ShippingController',
                'controller_name' => 'ShippingController',
                'method_name' => 'storeProvider',
            ]);
        }

    }
}
