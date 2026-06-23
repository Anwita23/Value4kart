<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V4_2_0;

use Database\Seeders\versions\v4_2_0\PermissionUpdateTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            PreferencesTableSeeder::class,
            EmailTemplatesTableSeeder::class,
            PermissionUpdateTableSeeder::class,
        ]);

    }
}
