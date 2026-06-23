<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V4_1_0;

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
        $this->call([
            PermissionsTableSeeder::class,
            PreferencesTableSeeder::class,
            UnitsTableSeeder::class,
            VendorsTableSeeder::class,
        ]);
    }
}
