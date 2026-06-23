<?php

namespace Modules\Dummy\Database\Seeders\Core\Versions\V4_1_0;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Unit::insertOrIgnore([
            'name' => 'Each',
            'abbr' => 'ea',
            'default' => 'Yes',
            'status' => 'Active',
        ]);
    }
}
