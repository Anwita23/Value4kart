<?php

namespace Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V5_0_0;

use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Database\Seeders\versions\v5_0_0\MenuItemsTableSeeder as V5_0_0MenuItemsTableSeeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $this->call(V5_0_0MenuItemsTableSeeder::class);
    }
}
