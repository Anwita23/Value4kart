<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V1_3_0;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PreferencesTableSeeder::class);
    }
}
