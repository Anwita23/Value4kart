<?php

namespace Modules\Dummy\Database\Seeders\Modules\Coupon;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CouponDatabaseSeeder extends Seeder
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
        $this->call(CouponsTableSeeder::class);
    }
}
