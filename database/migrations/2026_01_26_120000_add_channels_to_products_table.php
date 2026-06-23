<?php

use App\Enums\ProductChannel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     * Add product channels (JSON array: web, store, pos, invoice, purchase_order).
     * Default for new products is set in Product model (ProductChannel::allChannels()).
     * Existing products at migration time are set to all channels.
     * With migrate:fresh the products table is empty here; ProductChannelsSeeder runs after seeders to backfill.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('products', 'channels')) {
            Schema::table('products', function (Blueprint $table) {
                $table->json('channels')->nullable()->after('type');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('channels');
        });
    }
};
