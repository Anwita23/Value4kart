<?php

namespace Modules\Dummy\Database\Seeders\Modules\CMS\Versions\V1_2_0;

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
        $this->call(SlidersTableSeeder::class);
        $this->call(ThemeOptionsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
    }
}
