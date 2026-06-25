<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Find categories matching 'electronic' or 'device'
$categories = DB::table('categories')
    ->where('name', 'like', '%electronic%')
    ->orWhere('name', 'like', '%device%')
    ->get();

echo "Categories:\n";
foreach ($categories as $cat) {
    echo "ID: {$cat->id}, Name: {$cat->name}, Slug: {$cat->slug}\n";
    $count = DB::table('product_categories')->where('category_id', $cat->id)->count();
    echo "  Products: $count\n";
}

// Find tags matching 'electronic' or 'device'
$tags = DB::table('tags')
    ->where('name', 'like', '%electronic%')
    ->orWhere('name', 'like', '%device%')
    ->get();

echo "\nTags:\n";
foreach ($tags as $tag) {
    echo "ID: {$tag->id}, Name: {$tag->name}\n";
}
