<?php

namespace Modules\Dummy\Database\Seeders\Modules\Report;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ReportDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AdminMenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
    }
}
