<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('vendors')->delete();

        \DB::table('vendors')->insert([
            0 => [
                'id' => 1,
                'name' => 'Gizmo Tizmo',
                'email' => 'admin@techvill.net',
                'phone' => '01854789632',
                'formal_name' => 'Agatha Williams',
                'status' => 'Active',
                'website' => null,
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'Joopie’s Gallery',
                'email' => 'info@jamal.com',
                'phone' => '09854789632',
                'formal_name' => 'Jamal Williams',
                'status' => 'Active',
                'website' => 'https://www.jamal.com',
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            2 => [
                'id' => 16,
                'name' => 'SevenStar Furnitures',
                'email' => 'henry012045@gmail.com',
                'phone' => '0135467981',
                'formal_name' => 'Henry Wiliam',
                'status' => 'Active',
                'website' => null,
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            3 => [
                'id' => 17,
                'name' => 'Holistic Store',
                'email' => 'jacob012045@gmail.com',
                'phone' => '0135467982',
                'formal_name' => 'Jacob wiliam',
                'status' => 'Active',
                'website' => null,
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            4 => [
                'id' => 18,
                'name' => 'Home Decor Istanbul',
                'email' => 'mason012045@gmail.com',
                'phone' => '0135467983',
                'formal_name' => 'Mason Wiliam',
                'status' => 'Active',
                'website' => null,
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            5 => [
                'id' => 19,
                'name' => 'Minimal Lifestyle',
                'email' => 'daniel012045@gmail.com',
                'phone' => '0135467984',
                'formal_name' => 'Daniel Wiliam',
                'status' => 'Active',
                'website' => null,
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            6 => [
                'id' => 20,
                'name' => 'Galactic Sports',
                'email' => 'micheal012045@gmail.com',
                'phone' => '0135467985',
                'formal_name' => 'Micheal Wiliam',
                'status' => 'Active',
                'website' => null,
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            7 => [
                'id' => 21,
                'name' => 'Lenin Rock',
                'email' => 'lenin.rock@gmail.com',
                'phone' => '01789456258',
                'formal_name' => 'Tawhidul Islam',
                'status' => 'Active',
                'website' => 'https://techvill.net',
                'sell_commissions' => '0.00000000',
                'deleted_at' => null,
            ],
            8 => [
                'id' => 22,
                'name' => 'Danielle Rios',
                'email' => 'jexygobevo@mailinator.com',
                'phone' => '01732216554',
                'formal_name' => null,
                'status' => 'Pending',
                'website' => null,
                'sell_commissions' => null,
                'deleted_at' => null,
            ],
            9 => [
                'id' => 23,
                'name' => 'Curran Guerra',
                'email' => 'tawuqokel@mailinator.com',
                'phone' => '01248876447',
                'formal_name' => null,
                'status' => 'Pending',
                'website' => null,
                'sell_commissions' => null,
                'deleted_at' => null,
            ],
            10 => [
                'id' => 24,
                'name' => 'Aurelia Hopper',
                'email' => 'neses@mailinator.com',
                'phone' => '01734487668',
                'formal_name' => null,
                'status' => 'Pending',
                'website' => null,
                'sell_commissions' => null,
                'deleted_at' => null,
            ],
            11 => [
                'id' => 25,
                'name' => 'Harlan Whitehead',
                'email' => 'beganeco@mailinator.com',
                'phone' => '01451176447',
                'formal_name' => null,
                'status' => 'Pending',
                'website' => null,
                'sell_commissions' => null,
                'deleted_at' => null,
            ],
        ]);

    }
}
