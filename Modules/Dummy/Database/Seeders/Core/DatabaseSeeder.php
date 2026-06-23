<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;
use Modules\Dummy\Database\Seeders\Core\Versions\{
    V1_1_0\DatabaseSeeder as V11DatabaseSeeder,
    V1_2_0\DatabaseSeeder as V12DatabaseSeeder,
    V1_3_0\DatabaseSeeder as V13DatabaseSeeder,
    V1_4_0\DatabaseSeeder as V14DatabaseSeeder,
    V1_5_0\DatabaseSeeder as V15DatabaseSeeder,
    V1_6_0\DatabaseSeeder as V16DatabaseSeeder,
    V1_7_0\DatabaseSeeder as V17DatabaseSeeder,
    V1_8_0\DatabaseSeeder as V18DatabaseSeeder,
    V2_0_0\DatabaseSeeder as V20DatabaseSeeder,
    V2_0_1\DatabaseSeeder as V201DatabaseSeeder,
    V2_1_0\DatabaseSeeder as V21DatabaseSeeder,
    V2_1_1\DatabaseSeeder as V211DatabaseSeeder,
    V2_2_0\DatabaseSeeder as V22DatabaseSeeder,
    V2_3_0\DatabaseSeeder as V23DatabaseSeeder,
    V2_4_0\DatabaseSeeder as V24DatabaseSeeder,
    V2_5_0\DatabaseSeeder as V25DatabaseSeeder,
    V2_6_0\DatabaseSeeder as V26DatabaseSeeder,
    V2_7_0\DatabaseSeeder as V27DatabaseSeeder,
    V2_8_0\DatabaseSeeder as V28DatabaseSeeder,
    V2_9_0\DatabaseSeeder as V29DatabaseSeeder,
    V2_9_1\DatabaseSeeder as V291DatabaseSeeder,
    V2_9_2\DatabaseSeeder as V292DatabaseSeeder,
    V3_0_0\DatabaseSeeder as V30DatabaseSeeder,
    V3_1_0\DatabaseSeeder as V31DatabaseSeeder,
    V3_1_1\DatabaseSeeder as V311DatabaseSeeder,
    V3_2_0\DatabaseSeeder as V32DatabaseSeeder,
    V3_3_0\DatabaseSeeder as V33DatabaseSeeder,
    V3_4_0\DatabaseSeeder as V34DatabaseSeeder,
    V3_5_0\DatabaseSeeder as V35DatabaseSeeder,
    V3_5_1\DatabaseSeeder as V351DatabaseSeeder,
    V3_5_2\DatabaseSeeder as V352DatabaseSeeder,
    V4_0_0\DatabaseSeeder as V400DatabaseSeeder,
    V4_1_0\DatabaseSeeder as V410DatabaseSeeder,
    V4_2_0\DatabaseSeeder as V420DatabaseSeeder,
    V5_0_0\DatabaseSeeder as V500DatabaseSeeder,
    V5_1_0\DatabaseSeeder as V510DatabaseSeeder,
    V5_2_0\DatabaseSeeder as V520DatabaseSeeder,
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
        $this->call(CountriesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(EmailTemplatesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PreferencesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(RoleUsersTableSeeder::class);
        $this->call(VendorUsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(AttributeGroupsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(AttributeValuesTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(WishlistsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(ProductCrossSalesTableSeeder::class);
        $this->call(ProductRelatesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ProductTagsTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(OrderStatusRolesTableSeeder::class);
        $this->call(WithdrawalMethodsTableSeeder::class);
        $this->call(UserWithdrawalSettingsTableSeeder::class);
        $this->call(ObjectFilesTableSeeder::class);
        $this->call(ProductsMetaTableSeeder::class);
        $this->call(ProductUpsalesTableSeeder::class);
        $this->call(ProductCouponsTableSeeder::class);
        $this->call(FlashSalesTableSeeder::class);
        $this->call(UsersMetaTableSeeder::class);
        $this->call(VendorsMetaTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderStatusHistoriesTableSeeder::class);
        $this->call(OrdersMetaTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(OrderCommissionsTableSeeder::class);
        $this->call(BrandStatsTableSeeder::class);
        $this->call(CategoryStatsTableSeeder::class);
        $this->call(PaymentLogsTableSeeder::class);
        $this->call(ProductStatsTableSeeder::class);
        $this->call(WalletsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);

        $this->call(V11DatabaseSeeder::class);
        $this->call(V12DatabaseSeeder::class);
        $this->call(V13DatabaseSeeder::class);
        $this->call(V14DatabaseSeeder::class);
        $this->call(V15DatabaseSeeder::class);
        $this->call(V16DatabaseSeeder::class);
        $this->call(V17DatabaseSeeder::class);
        $this->call(V18DatabaseSeeder::class);
        $this->call(V20DatabaseSeeder::class);
        $this->call(V201DatabaseSeeder::class);
        $this->call(V21DatabaseSeeder::class);
        $this->call(V211DatabaseSeeder::class);
        $this->call(V22DatabaseSeeder::class);
        $this->call(V23DatabaseSeeder::class);
        $this->call(V24DatabaseSeeder::class);
        $this->call(V25DatabaseSeeder::class);
        $this->call(V26DatabaseSeeder::class);
        $this->call(V27DatabaseSeeder::class);
        $this->call(V28DatabaseSeeder::class);
        $this->call(V29DatabaseSeeder::class);
        $this->call(V291DatabaseSeeder::class);
        $this->call(V292DatabaseSeeder::class);
        $this->call(V30DatabaseSeeder::class);
        $this->call(V31DatabaseSeeder::class);
        $this->call(V311DatabaseSeeder::class);
        $this->call(V32DatabaseSeeder::class);
        $this->call(V33DatabaseSeeder::class);
        $this->call(V34DatabaseSeeder::class);
        $this->call(V35DatabaseSeeder::class);
        $this->call(V351DatabaseSeeder::class);
        $this->call(V352DatabaseSeeder::class);
        $this->call(V400DatabaseSeeder::class);
        $this->call(V410DatabaseSeeder::class);
        $this->call(V420DatabaseSeeder::class);
        $this->call(V500DatabaseSeeder::class);
        $this->call(V510DatabaseSeeder::class);
        $this->call(V520DatabaseSeeder::class);
    }
}
