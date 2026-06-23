<?php

namespace Modules\Dummy\Database\Seeders\Modules\MenuBuilder;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\{
    V1_1_0\DatabaseSeeder as V11DatabaseSeeder,
    V1_2_0\DatabaseSeeder as V12DatabaseSeeder,
    V1_7_0\DatabaseSeeder as V17DatabaseSeeder,
    V2_0_0\DatabaseSeeder as V20DatabaseSeeder,
    V2_1_0\DatabaseSeeder as V21DatabaseSeeder,
    V2_2_0\DatabaseSeeder as V22DatabaseSeeder,
    V2_7_0\DatabaseSeeder as V27DatabaseSeeder,
    V2_9_0\DatabaseSeeder as V29DatabaseSeeder,
    V3_1_1\DatabaseSeeder as V311DatabaseSeeder,
    V5_0_0\DatabaseSeeder as V500DatabaseSeeder,
};

class MenuBuilderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(AdminMenusTableSeeder::class);
        $this->call(V11DatabaseSeeder::class);
        $this->call(V12DatabaseSeeder::class);
        $this->call(V17DatabaseSeeder::class);
        $this->call(V20DatabaseSeeder::class);
        $this->call(V21DatabaseSeeder::class);
        $this->call(V22DatabaseSeeder::class);
        $this->call(V27DatabaseSeeder::class);
        $this->call(V29DatabaseSeeder::class);
        $this->call(V311DatabaseSeeder::class);
        $this->call(MenuItemSaasTableSeeder::class);
        $this->call(V500DatabaseSeeder::class);

    }
}
