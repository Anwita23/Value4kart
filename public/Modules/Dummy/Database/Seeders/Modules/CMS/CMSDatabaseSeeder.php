<?php

namespace Modules\Dummy\Database\Seeders\Modules\CMS;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dummy\Database\Seeders\Modules\CMS\Versions\{
    V1_1_0\DatabaseSeeder as V11DatabaseSeeder,
    V1_2_0\DatabaseSeeder as V12DatabaseSeeder,
    V2_2_0\DatabaseSeeder as V22DatabaseSeeder,
    V2_4_0\DatabaseSeeder as V24DatabaseSeeder
};

class CMSDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PageTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(AdminMenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(ThemeOptionsTableSeeder::class);
        $this->call(TemplateAndLayoutSeeder::class);
        $this->call(ComponentsTableSeeder::class);
        $this->call(ComponentPropertiesTableSeeder::class);
        $this->call(V11DatabaseSeeder::class);
        $this->call(V12DatabaseSeeder::class);
        $this->call(V22DatabaseSeeder::class);
        $this->call(V24DatabaseSeeder::class);
    }
}
