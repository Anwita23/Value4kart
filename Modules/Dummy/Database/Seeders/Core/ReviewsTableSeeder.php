<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $reviewFactory = new ReviewFactory();

        \DB::table('reviews')->delete();

        \DB::table('reviews')->insert([
            0 => [
                'id' => 1,
                'comments' => 'Good Product',
                'rating' => 3,
                'reviewed_by' => null,
                'user_id' => 2,
                'product_id' => 1141,
                'is_public' => 1,
                'status' => 'Active',
            ],
            1 => [
                'id' => 2,
                'comments' => 'Good phone',
                'rating' => 3,
                'reviewed_by' => null,
                'user_id' => 2,
                'product_id' => 1142,
                'is_public' => 1,
                'status' => 'Active',
            ],
            2 => [
                'id' => 3,
                'comments' => 'I love this phone',
                'rating' => 5,
                'reviewed_by' => null,
                'user_id' => 2,
                'product_id' => 1143,
                'is_public' => 1,
                'status' => 'Active',
            ],
        ]);

        $reviewFactory = new ReviewFactory();
        \DB::table('reviews')->insert($reviewFactory->definition());
    }
}
