<?php

namespace Database\Seeders;

use App\Enums\ProductChannel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductChannelsSeeder extends Seeder
{
    /**
     * Set default channels for all products that have null or empty channels.
     * Needed after migrate:fresh --seed because the migration runs before seeders create products.
     */
    public function run(): void
    {
        if (! Schema::hasColumn('products', 'channels')) {
            return;
        }

        $defaultChannels = json_encode(ProductChannel::allChannels());
        DB::table('products')
            ->whereNull('channels')
            ->update(['channels' => $defaultChannels]);
    }
}
