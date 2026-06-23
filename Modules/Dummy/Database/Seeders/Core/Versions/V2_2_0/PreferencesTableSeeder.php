<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V2_2_0;

use App\Models\Preference;
use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Preference::updateOrInsert(
            [
                'category' => 'preference',
                'field' => 'db_version',
            ],
            [
                'value' => '2.2.0',
            ]
        );

        Preference::insertOrIgnore([
            'category' => 'product_vendor',
            'field' => 'is_vendor_shop_decoration_active',
            'value' => '1',
        ]);

        $preference = Preference::where('field', 'bulk_pay_count')->first();

        if (empty($preference)) {

            $data = [
                0 =>   [
                    'category' => 'preference',
                    'field' => 'bulk_pay_count',
                    'value' => '20',
                ],
                1 => [
                    'category' => 'preference',
                    'field' => 'bulk_payment_user_role',
                    'value' => '["2"]',
                ],
            ];

            Preference::insert($data);
        }
    }
}
