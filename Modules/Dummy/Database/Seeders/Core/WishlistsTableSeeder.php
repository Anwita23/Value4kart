<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('wishlists')->delete();

        \DB::table('wishlists')->insert([
            0 => [
                'id' => 37,
                'product_id' => 1141,
                'user_id' => 2,
                'ip_address' => '::1',
                'browser_agent' => 'Google Chrome',
                'created_at' => randomDateBefore(),
            ],
            1 => [
                'id' => 38,
                'product_id' => 1142,
                'user_id' => 2,
                'ip_address' => '::1',
                'browser_agent' => 'Google Chrome',
                'created_at' => randomDateBefore(),
            ],
            2 => [
                'id' => 39,
                'product_id' => 1143,
                'user_id' => 2,
                'ip_address' => '::1',
                'browser_agent' => 'Google Chrome',
                'created_at' => randomDateBefore(),
            ],
        ]);
    }
}
