<?php

namespace Modules\Dummy\Database\Seeders\Modules\Delivery;

use Illuminate\Database\Seeder;
use Modules\Dummy\Database\Seeders\Modules\Delivery\Versions\V2_1_0\{
    DeliveryMansTableSeeder,
    EmailTemplatesTableSeeder,
    MenuItemsTableSeeder,
    MenusTableSeeder,
    OrderStatusesTableSeeder,
    PermissionRolesTableSeeder,
    PermissionsTableSeeder,
    PreferencesTableSeeder,
    RolesTableSeeder,
    RoleUsersTableSeeder,
    UsersTableSeeder,
    DeliveryManOrdersTableSeeder
};

class DeliveryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenusTableSeeder::class,
            RolesTableSeeder::class,
            OrderStatusesTableSeeder::class,
            PreferencesTableSeeder::class,
            MenuItemsTableSeeder::class,
            UsersTableSeeder::class,
            RoleUsersTableSeeder::class,
            DeliveryMansTableSeeder::class,
            EmailTemplatesTableSeeder::class,
            PermissionRolesTableSeeder::class,
            PermissionsTableSeeder::class,
            DeliveryManOrdersTableSeeder::class,
        ]);
    }
}
