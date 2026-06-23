<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_1_1;

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
        ]);
    }
}
