<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class AttributeGroupsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('attribute_groups')->delete();

        \DB::table('attribute_groups')->insert([
            0 => [
                'id' => 28,
                'vendor_id' => 1,
                'name' => 'smartphone_Attributes',
                'summary' => 'This is the attribute group that contains body attributes of smartphone',
                'status' => 'Active',

            ],
            1 => [
                'id' => 29,
                'vendor_id' => 1,
                'name' => 'Feature_Phone_Attributes',
                'summary' => 'This is the attribute group that contains body attributes of Feature Phone',
                'status' => 'Active',

            ],
            2 => [
                'id' => 30,
                'vendor_id' => 1,
                'name' => 'body',
                'summary' => null,
                'status' => 'Inactive',

            ],
            3 => [
                'id' => 31,
                'vendor_id' => null,
                'name' => 'Body(Sneakers)',
                'summary' => 'This is the attribute group that contains body attributes of  sneakers',
                'status' => 'Inactive',

            ],
            4 => [
                'id' => 32,
                'vendor_id' => 1,
                'name' => 'Laptop_Attributes',
                'summary' => 'This is the attribute group that contains body attributes of  laptops',
                'status' => 'Active',

            ],
            5 => [
                'id' => 33,
                'vendor_id' => 1,
                'name' => 'Cameras_Attributes',
                'summary' => 'This is the attribute group that contains body attributes of cameras',
                'status' => 'Active',

            ],
        ]);

    }
}
