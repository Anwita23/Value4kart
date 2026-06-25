<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$comp = DB::table('components')->where('id', 2)->first();
print_r($comp);

if ($comp) {
    $layout = DB::table('layouts')->where('id', $comp->layout_id)->first();
    print_r($layout);
}

echo "=== All properties for component ID 2 ===\n";
$props = DB::table('component_properties')->where('component_id', 2)->get();
foreach ($props as $p) {
    echo "{$p->name} ({$p->type}): {$p->value}\n";
}
