<?php

namespace Modules\Dummy\Database\Seeders\Modules\Gateway;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GatewayDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(GatewaysTableDataSeeder::class);

    }
}
