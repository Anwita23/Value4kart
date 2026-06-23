<?php

namespace Modules\Dummy\Database\Seeders\Modules\AdvanceReport;

use Illuminate\Database\Seeder;

class AdvanceReportDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(MenuItemsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
