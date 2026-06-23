<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Seeder;

class AdminMenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('admin_menus')->insert([
            0 => [
                'name' => 'Inventory',
                'slug' => 'inventory',
                'url' => 'inventory',
                'permission' => '',
                'is_default' => 0,
            ],
        ]);

    }
}
