<?php

namespace Modules\Dummy\Database\Seeders\Modules\Delivery\Versions\V2_1_0;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMansTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        User::whereIn('email', ['delivery@techvill.net', 'delivery2@techvill.net'])->get()->map(function ($user) {
            if (DB::table('delivery_mans')->where('user_id', $user->id)->first()) {
                return true;
            }

            DB::table('delivery_mans')->insert([
                'user_id' => $user->id,
                'unique_id' => 'DM2023' . $user->id,
                'license_status' => 'verified',
                'is_active' => 1,
            ]);
        });
    }
}
