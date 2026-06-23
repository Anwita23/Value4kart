<?php

namespace Modules\Dummy\Database\Seeders\Modules\FormBuilder;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FormBuilderDatabaseSeeder extends Seeder
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
        $this->call(FormTableSeeder::class);
        $this->call(FormSubmissionsTableSeeder::class);
    }
}
