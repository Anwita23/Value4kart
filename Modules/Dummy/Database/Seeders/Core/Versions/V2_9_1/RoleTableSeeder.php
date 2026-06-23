<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_9_1;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrInsert(
            [
                'id' => 6,
                'name' => 'Staff user',
                'slug' => '1-staff-user',
                'type' => 'vendor',
                'description' => 'Staff user description',
                'vendor_id' => 1,
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Staff user',
            ]
        );
    }
}
