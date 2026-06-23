<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V5_2_0;

use Illuminate\Database\Seeder;
use Database\Seeders\versions\v5_2_0\DatabaseSeeder as V520DatabaseSeeder;
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
            V520DatabaseSeeder::class,
        ]);
    }
}
