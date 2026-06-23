<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

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
        $this->call(AdminMenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\vendor\MenuItemsTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\vendor\PermissionTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\LocationsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\SuppliersTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\TransfersTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\TransferDetailsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\PurchasesTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\PurchaseDetailsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\StockManagementsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0\LogsTableSeeder::class);
    }
}
