<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V1_7_0;

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
            PreferencesTableSeeder::class,
            PermissionsTableSeeder::class,
        ]);
    }
}
