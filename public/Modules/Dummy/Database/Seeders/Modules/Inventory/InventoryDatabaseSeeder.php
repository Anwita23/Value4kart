<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\DatabaseSeeder as V23DatabaseSeeder;

class InventoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(V23DatabaseSeeder::class);
    }
}
