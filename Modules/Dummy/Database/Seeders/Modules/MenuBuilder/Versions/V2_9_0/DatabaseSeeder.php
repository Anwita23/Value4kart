<?php

namespace Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V2_9_0;

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
            MenuItemsTableSeeder::class,
            AdminMenusTableSeeder::class,
        ]);
    }
}
