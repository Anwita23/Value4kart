<?php

namespace Modules\Dummy\Database\Seeders\Modules\Commission;

use Illuminate\Database\Seeder;

class CommissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('commissions')->delete();

        \DB::table('commissions')->insert([
            0 => [
                'id' => 1,
                'is_active' => 1,
                'is_category_based' => 1,
                'amount' => 3.0,
            ],
        ]);

    }
}
