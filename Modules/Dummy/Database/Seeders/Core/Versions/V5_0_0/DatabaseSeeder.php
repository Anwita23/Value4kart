<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V5_0_0;

use Illuminate\Database\Seeder;
use Database\Seeders\versions\v5_0_0\DatabaseSeeder as V500DatabaseSeeder;
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
            V500DatabaseSeeder::class,
        ]);
    }
}
