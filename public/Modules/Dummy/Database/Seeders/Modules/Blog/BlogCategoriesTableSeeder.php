<?php

namespace Modules\Dummy\Database\Seeders\Modules\Blog;

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('blog_categories')->delete();

        \DB::table('blog_categories')->insert([
            0 => [
                'id' => 1,
                'name' => 'Uncategorized',
                'status' => 'Active',
            ],
            1 => [
                'id' => 3,
                'name' => 'Travel',
                'status' => 'Active',
            ],
            2 => [
                'id' => 4,
                'name' => 'Technology',
                'status' => 'Active',
            ],
            3 => [
                'id' => 5,
                'name' => 'Beauty',
                'status' => 'Active',
            ],
            4 => [
                'id' => 6,
                'name' => 'Health',
                'status' => 'Active',
            ],
            5 => [
                'id' => 7,
                'name' => 'Fashion',
                'status' => 'Active',
            ],
            6 => [
                'id' => 8,
                'name' => 'Food',
                'status' => 'Active',
            ],
            7 => [
                'id' => 9,
                'name' => 'Grocery',
                'status' => 'Active',
            ],
            8 => [
                'id' => 10,
                'name' => 'Lifestyle',
                'status' => 'Active',
            ],
            9 => [
                'id' => 11,
                'name' => 'Interior design',
                'status' => 'Active',
            ],
            10 => [
                'id' => 12,
                'name' => 'Digital product',
                'status' => 'Active',
            ],
        ]);

    }
}
