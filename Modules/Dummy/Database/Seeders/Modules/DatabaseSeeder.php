<?php

namespace Modules\Dummy\Database\Seeders\Modules;

use Illuminate\Database\Seeder;
use Modules\Dummy\Database\Seeders\Modules\{
    MenuBuilder\MenuBuilderDatabaseSeeder,
    Newsletter\NewsletterDatabaseSeeder,
    Popup\PopupDatabaseSeeder,
    Blog\BlogDatabaseSeeder,
    CMS\CMSDatabaseSeeder,
    Commission\CommissionDatabaseSeeder,
    Coupon\CouponDatabaseSeeder,
    Gateway\GatewayDatabaseSeeder,
    Refund\RefundDatabaseSeeder,
    Shipping\ShippingDatabaseSeeder,
    Shop\ShopDatabaseSeeder,
    MediaManager\MediaManagerDatabaseSeeder,
    Geolocale\GeoLocaleDatabaseSeeder,
    Tax\TaxDatabaseSeeder,
    Ticket\TicketDatabaseSeeder,
    FormBuilder\FormBuilderDatabaseSeeder,
    Report\ReportDatabaseSeeder,
    Upgrader\UpgraderDatabaseSeeder,
    Inventory\InventoryDatabaseSeeder,
    Delivery\DeliveryDatabaseSeeder,
    AdvanceReport\AdvanceReportDatabaseSeeder,
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuBuilderDatabaseSeeder::class);
        $this->call(NewsletterDatabaseSeeder::class);
        $this->call(PopupDatabaseSeeder::class);
        $this->call(BlogDatabaseSeeder::class);
        $this->call(CMSDatabaseSeeder::class);
        $this->call(CommissionDatabaseSeeder::class);
        $this->call(CouponDatabaseSeeder::class);
        $this->call(GatewayDatabaseSeeder::class);
        $this->call(RefundDatabaseSeeder::class);
        $this->call(ShippingDatabaseSeeder::class);
        $this->call(ShopDatabaseSeeder::class);
        $this->call(MediaManagerDatabaseSeeder::class);
        $this->call(GeoLocaleDatabaseSeeder::class);
        $this->call(TaxDatabaseSeeder::class);
        $this->call(TicketDatabaseSeeder::class);
        $this->call(FormBuilderDatabaseSeeder::class);
        $this->call(ReportDatabaseSeeder::class);
        $this->call(UpgraderDatabaseSeeder::class);
        $this->call(InventoryDatabaseSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V2_4_0\MenuItemsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V2_5_0\MenuItemsTableSeeder::class);
        $this->call(\Modules\Dummy\Database\Seeders\Modules\MenuBuilder\Versions\V3_1_1\MenuItemsTableSeeder::class);
        $this->call(DeliveryDatabaseSeeder::class);
        $this->call(AdvanceReportDatabaseSeeder::class);
    }
}
