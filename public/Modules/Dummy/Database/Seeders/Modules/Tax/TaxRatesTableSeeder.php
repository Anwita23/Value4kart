<?php

namespace Modules\Dummy\Database\Seeders\Modules\Tax;

use Illuminate\Database\Seeder;

class TaxRatesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('tax_rates')->delete();

        \DB::table('tax_rates')->insert([
            0 => [
                'id' => 90,
                'tax_class_id' => 1,
                'country' => null,
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'Sales',
                'tax_rate' => '2.00000000',
                'priority' => 1,
                'compound' => 1,
                'shipping' => 0,
                'sort_by' => 0,
            ],
            1 => [
                'id' => 91,
                'tax_class_id' => 1,
                'country' => 'bd',
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'VAT',
                'tax_rate' => '3.00000000',
                'priority' => 2,
                'compound' => 0,
                'shipping' => 0,
                'sort_by' => 8,
            ],
            2 => [
                'id' => 92,
                'tax_class_id' => 1,
                'country' => 'in',
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'GST',
                'tax_rate' => '5.00000000',
                'priority' => 2,
                'compound' => 0,
                'shipping' => 0,
                'sort_by' => 8,
            ],
            3 => [
                'id' => 93,
                'tax_class_id' => 1,
                'country' => 'gb',
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'VAT',
                'tax_rate' => '20.00000000',
                'priority' => 3,
                'compound' => 1,
                'shipping' => 1,
                'sort_by' => 8,
            ],
            4 => [
                'id' => 94,
                'tax_class_id' => 1,
                'country' => 'gb',
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'VAT',
                'tax_rate' => '5.00000000',
                'priority' => 3,
                'compound' => 1,
                'shipping' => 1,
                'sort_by' => 8,
            ],
            5 => [
                'id' => 95,
                'tax_class_id' => 1,
                'country' => 'gb',
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'VAT',
                'tax_rate' => '0.00000000',
                'priority' => 3,
                'compound' => 1,
                'shipping' => 1,
                'sort_by' => 8,
            ],
            6 => [
                'id' => 96,
                'tax_class_id' => 1,
                'country' => 'us',
                'state' => null,
                'city' => null,
                'postcode' => null,
                'name' => 'US',
                'tax_rate' => '10.00000000',
                'priority' => 3,
                'compound' => 1,
                'shipping' => 1,
                'sort_by' => 8,
            ],
            7 => [
                'id' => 97,
                'tax_class_id' => 1,
                'country' => 'us',
                'state' => 'AL',
                'city' => null,
                'postcode' => '90210',
                'name' => 'US AL',
                'tax_rate' => '2.00000000',
                'priority' => 4,
                'compound' => 1,
                'shipping' => 1,
                'sort_by' => 13,
            ],
            8 => [
                'id' => 98,
                'tax_class_id' => 1,
                'country' => 'us',
                'state' => 'AL',
                'city' => null,
                'postcode' => '20500',
                'name' => 'US AL',
                'tax_rate' => '2.00000000',
                'priority' => 4,
                'compound' => 1,
                'shipping' => 1,
                'sort_by' => 13,
            ],
        ]);

    }
}
