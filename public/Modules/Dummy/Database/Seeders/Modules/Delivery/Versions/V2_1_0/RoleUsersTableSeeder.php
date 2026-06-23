<?php

namespace Modules\Dummy\Database\Seeders\Modules\Delivery\Versions\V2_1_0;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('slug', 'delivery-man')->first();
        User::whereIn('email', ['delivery@techvill.net', 'delivery2@techvill.net'])->get()->map(function ($user) use ($role) {
            if (! DB::table('role_users')->where('role_id', $role->id)->where('user_id', $user->id)->first()) {
                DB::table('role_users')->insert([
                    'role_id' => $role->id,
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
