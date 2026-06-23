<?php

namespace Modules\Dummy\Database\Seeders\Modules\Refund;

use Illuminate\Database\Seeder;

class RefundProcessesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('refund_processes')->delete();

        \DB::table('refund_processes')->insert([
            0 => [
                'id' => 1,
                'user_id' => 1,
                'refund_id' => 1,
                'note' => 'Sed porttitor lectus nibh?',
            ],
            1 => [
                'id' => 2,
                'user_id' => 2,
                'refund_id' => 1,
                'note' => 'Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.',
            ],
            2 => [
                'id' => 3,
                'user_id' => 1,
                'refund_id' => 1,
                'note' => 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta.',
            ],
            3 => [
                'id' => 4,
                'user_id' => 2,
                'refund_id' => 1,
                'note' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            4 => [
                'id' => 5,
                'user_id' => 1,
                'refund_id' => 1,
                'note' => 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ],
            5 => [
                'id' => 6,
                'user_id' => 1,
                'refund_id' => 2,
                'note' => 'Nulla porttitor accumsan tincidunt?',
            ],
            6 => [
                'id' => 7,
                'user_id' => 7,
                'refund_id' => 2,
                'note' => 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.',
            ],
            7 => [
                'id' => 8,
                'user_id' => 1,
                'refund_id' => 2,
                'note' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            ],
            8 => [
                'id' => 9,
                'user_id' => 7,
                'refund_id' => 2,
                'note' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
            ],
            9 => [
                'id' => 11,
                'user_id' => 1,
                'refund_id' => 2,
                'note' => 'Donec sollicitudin molestie malesuada.',
            ],
            10 => [
                'id' => 12,
                'user_id' => 7,
                'refund_id' => 2,
                'note' => 'Curabitur aliquet quam id dui posuere blandit?',
            ],
            11 => [
                'id' => 13,
                'user_id' => 7,
                'refund_id' => 2,
                'note' => 'Proin eget tortor risus.',
            ],
            12 => [
                'id' => 14,
                'user_id' => 1,
                'refund_id' => 2,
                'note' => 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.',
            ],
            13 => [
                'id' => 15,
                'user_id' => 7,
                'refund_id' => 2,
                'note' => 'Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ],
            14 => [
                'id' => 16,
                'user_id' => 6,
                'refund_id' => 3,
                'note' => 'Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.',
            ],
            15 => [
                'id' => 17,
                'user_id' => 1,
                'refund_id' => 3,
                'note' => 'Nulla quis lorem ut libero malesuada feugiat.',
            ],
            16 => [
                'id' => 18,
                'user_id' => 6,
                'refund_id' => 3,
                'note' => 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.',
            ],
            17 => [
                'id' => 19,
                'user_id' => 1,
                'refund_id' => 3,
                'note' => 'Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
            ],
            18 => [
                'id' => 20,
                'user_id' => 6,
                'refund_id' => 3,
                'note' => 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh.',
            ],
            19 => [
                'id' => 21,
                'user_id' => 1,
                'refund_id' => 3,
                'note' => 'Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.',
            ],
        ]);

    }
}
