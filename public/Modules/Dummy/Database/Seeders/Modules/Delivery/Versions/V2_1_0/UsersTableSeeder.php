<?php

namespace Modules\Dummy\Database\Seeders\Modules\Delivery\Versions\V2_1_0;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        if (! DB::table('users')->where('email', 'delivery@techvill.net')->first()) {
            DB::table('users')->insert([
                [
                    'name' => 'Delivery boy',
                    'email' => 'delivery@techvill.net',
                    'email_verified_at' => null,
                    'password' => '$2y$10$VumeFKoNGllPuTsGlH7jQeZldiqjJwVUUZvNP7d7D5VoUo8DT76ki',
                    'phone' => null,
                    'birthday' => null,
                    'gender' => 'Male',
                    'address' => null,
                    'sso_account_id' => null,
                    'sso_service' => null,
                    'remember_token' => null,
                    'status' => 'Active',
                    'activation_code' => null,
                    'activation_otp' => null,
                ],
            ]);
        }

        if (! DB::table('users')->where('email', 'delivery2@techvill.net')->first()) {
            DB::table('users')->insert([
                [
                    'name' => 'Delivery boy2',
                    'email' => 'delivery2@techvill.net',
                    'email_verified_at' => null,
                    'password' => '$2y$10$VumeFKoNGllPuTsGlH7jQeZldiqjJwVUUZvNP7d7D5VoUo8DT76ki',
                    'phone' => null,
                    'birthday' => null,
                    'gender' => 'Male',
                    'address' => null,
                    'sso_account_id' => null,
                    'sso_service' => null,
                    'remember_token' => null,
                    'status' => 'Active',
                    'activation_code' => null,
                    'activation_otp' => null,
                ],
            ]);
        }
    }
}
