<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class FlashSalesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('flash_sales')->delete();

    }
}
