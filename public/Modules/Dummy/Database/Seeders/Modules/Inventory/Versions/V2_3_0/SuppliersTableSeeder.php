<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('suppliers')->delete();

        \DB::table('suppliers')->insert([
            0 => [
                'id' => 1,
                'vendor_id' => 1,
                'name' => 'David Hunt',
                'status' => 'Active',
            ],
            1 => [
                'id' => 2,
                'vendor_id' => 19,
                'name' => 'Carmen Harvey',
                'status' => 'Active',
            ],
            2 => [
                'id' => 3,
                'vendor_id' => 16,
                'name' => 'Wendy Jefferson',
                'status' => 'Active',
            ],
            3 => [
                'id' => 4,
                'vendor_id' => 1,
                'name' => 'Dwayne Rodgers',
                'status' => 'Active',
            ],
        ]);
    }
}
