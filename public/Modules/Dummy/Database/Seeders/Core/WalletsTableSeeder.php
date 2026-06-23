<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('wallets')->delete();

        \DB::table('wallets')->insert([
            0 => [
                'id' => 1,
                'user_id' => 15,
                'currency_id' => 3,
                'balance' => '1571.40000000',
                'is_default' => 1,
            ],
            1 => [
                'id' => 2,
                'user_id' => 18,
                'currency_id' => 3,
                'balance' => '304.58000000',
                'is_default' => 1,
            ],
            2 => [
                'id' => 3,
                'user_id' => 1,
                'currency_id' => 3,
                'balance' => '129.98000000',
                'is_default' => 1,
            ],
            3 => [
                'id' => 4,
                'user_id' => 3,
                'currency_id' => 3,
                'balance' => '48.50000000',
                'is_default' => 1,
            ],
            4 => [
                'id' => 5,
                'user_id' => 2,
                'currency_id' => 3,
                'balance' => '215.00000000',
                'is_default' => 1,
            ],
            5 => [
                'id' => 6,
                'user_id' => 7,
                'currency_id' => 3,
                'balance' => '75.00000000',
                'is_default' => 1,
            ],
        ]);

    }
}
