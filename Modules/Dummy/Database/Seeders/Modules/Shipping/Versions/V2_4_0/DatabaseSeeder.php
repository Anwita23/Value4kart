<?php

namespace Modules\Dummy\Database\Seeders\Modules\Shipping\Versions\V2_4_0;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ShippingProvidersTableSeeder::class]);
        $this->call([PermissionsTableSeeder::class]);
    }
}
