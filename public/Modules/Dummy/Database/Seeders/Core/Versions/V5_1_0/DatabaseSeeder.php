<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V5_1_0;

use Illuminate\Database\Seeder;
use Database\Seeders\versions\v5_1_0\DatabaseSeeder as V510DatabaseSeeder;
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
            V510DatabaseSeeder::class,
        ]);
    }
}
