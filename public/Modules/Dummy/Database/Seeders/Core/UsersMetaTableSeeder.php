<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class UsersMetaTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users_meta')->delete();

        \DB::table('users_meta')->insert([
            0 => [
                'id' => 1,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'designation',
                'value' => 'Tourist Guide',
            ],
            1 => [
                'id' => 2,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'description',
                'value' => 'Michael is a lover, fighter and hater. He loves to travel, has an app called ‘The Travaluk’. He has travelled over 30 countries so far and dreams to visit every one of them.',
            ],
            2 => [
                'id' => 3,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'facebook',
                'value' => 'https://www.facebook.com',
            ],
            3 => [
                'id' => 4,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'twitter',
                'value' => 'https://www.twitter.com',
            ],
            4 => [
                'id' => 5,
                'owner_type' => 'App\\Models\\User',
                'owner_id' => 1,
                'type' => 'string',
                'key' => 'instagram',
                'value' => 'https://www.instagram.com',
            ],
        ]);

    }
}
