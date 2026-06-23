<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('role_users')->delete();

        \DB::table('role_users')->insert([
            0 => [
                'role_id' => 1,
                'user_id' => 1,
            ],
            1 => [
                'role_id' => 2,
                'user_id' => 3,
            ],
            2 => [
                'role_id' => 3,
                'user_id' => 2,
            ],
            3 => [
                'role_id' => 3,
                'user_id' => 4,
            ],
            4 => [
                'role_id' => 3,
                'user_id' => 6,
            ],
            5 => [
                'role_id' => 3,
                'user_id' => 5,
            ],
            6 => [
                'role_id' => 3,
                'user_id' => 8,
            ],
            7 => [
                'role_id' => 3,
                'user_id' => 7,
            ],
            8 => [
                'role_id' => 3,
                'user_id' => 9,
            ],
            9 => [
                'role_id' => 2,
                'user_id' => 15,
            ],
            10 => [
                'role_id' => 2,
                'user_id' => 16,
            ],
            11 => [
                'role_id' => 2,
                'user_id' => 17,
            ],
            12 => [
                'role_id' => 2,
                'user_id' => 18,
            ],
            13 => [
                'role_id' => 2,
                'user_id' => 19,
            ],
            14 => [
                'role_id' => 3,
                'user_id' => 20,
            ],
            15 => [
                'role_id' => 2,
                'user_id' => 21,
            ],
            16 => [
                'role_id' => 2,
                'user_id' => 22,
            ],
            17 => [
                'role_id' => 2,
                'user_id' => 23,
            ],
            18 => [
                'role_id' => 2,
                'user_id' => 24,
            ],
            19 => [
                'role_id' => 2,
                'user_id' => 25,
            ],
        ]);

    }
}
