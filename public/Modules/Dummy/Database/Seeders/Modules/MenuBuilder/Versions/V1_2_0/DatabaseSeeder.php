<?php

namespace Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V1_2_0;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuItemsTableSeeder::class);
    }
}
