<?php

namespace Modules\Dummy\Database\Seeders\Modules\Shipping;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dummy\Database\Seeders\Modules\Shipping\Versions\{
    V2_4_0\DatabaseSeeder as V24DatabaseSeeder
};

class ShippingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(AdminMenusTableSeeder::class);
        $this->call(ShippingClassesTableSeeder::class);
        $this->call(ShippingMethodsTableSeeder::class);
        $this->call(ShippingZonesTableSeeder::class);
        $this->call(ShippingZoneGeolocalesTableSeeder::class);
        $this->call(ShippingZoneShippingClassesTableSeeder::class);
        $this->call(ShippingZoneShippingMethodsTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(V24DatabaseSeeder::class);
    }
}
