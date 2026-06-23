<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_9_1;

use App\Models\RoleUser;
use App\Models\VendorUser;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        RoleUser::updateOrInsert(
          [
              'role_id' => 6,
              'user_id' => 26,
          ],
          [
              'user_id' => 26,
          ]
        );

        VendorUser::insert(
            [
              'vendor_id' => 1,
              'user_id' => 26,
            ],
            [
              'user_id' => 26,
            ]
        );

       
    }
}



