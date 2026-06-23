<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_9_1;

use App\Models\User;
use App\Models\VendorUser;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        User::updateOrInsert(
            [
                'id' => 26,
                'name' => 'Gizmo Staff',
                'email' => 'staff@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$zXgnp.9rIXbNYr3ZUo7xVOWUhKKHXJZ63nBgT1zLFgi0CG6RUgfxG',
                'phone' => null,
                'birthday' => null,
                'gender' => null,
                'address' => null,
                'sso_account_id' => null,
                'sso_service' => null,
                'remember_token' => null,
                'status' => 'Active',
                'activation_code' => null,
                'activation_otp' => null,
            ],
            [
                'id' => '26',
                'name' => 'Gizmo Staff',
                'email' => 'staff@gmail.com',
            ]
        );
    }
}



