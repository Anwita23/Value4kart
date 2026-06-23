<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_4_0;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        if (! Permission::where('name', 'App\\Http\\Controllers\\AddressSettingController@index')->first()) {
            Permission::insert([
                'name' => 'App\\Http\\Controllers\\AddressSettingController@index',
                'controller_path' => 'App\\Http\\Controllers\\AddressSettingController',
                'controller_name' => 'AddressSettingController',
                'method_name' => 'index',
            ]);
        }

        if (! Permission::where('name', 'App\\Http\\Controllers\\AddressSettingController@update')->first()) {
            Permission::insert([
                'name' => 'App\\Http\\Controllers\\AddressSettingController@update',
                'controller_path' => 'App\\Http\\Controllers\\AddressSettingController',
                'controller_name' => 'AddressSettingController',
                'method_name' => 'update',
            ]);
        }
    }
}
