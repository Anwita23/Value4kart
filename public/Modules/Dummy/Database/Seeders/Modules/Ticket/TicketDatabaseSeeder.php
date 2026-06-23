<?php

namespace Modules\Dummy\Database\Seeders\Modules\Ticket;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TicketDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PrioritiesTableSeeder::class);
        $this->call(ThreadStatusesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(AdminMenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(ThreadRepliesTableSeeder::class);
    }
}
