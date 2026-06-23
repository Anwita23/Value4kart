<?php

use Illuminate\Support\Facades\File;

function beforeUpgrade(){
    set_time_limit(0);
    
    if (version_compare(\Modules\Addons\Entities\Addon::find('Upgrader')->get('version'), '1.4', '<')) {
        $sourcePath = storage_path('updates/Upgrader.zip');
        $destinationPath = base_path('Modules');
        $zip = new ZipArchive;
        if (File::exists($sourcePath) && $zip->open($sourcePath) === TRUE) {
            $zip->extractTo($destinationPath);
        }
        \Artisan::call('optimize:clear');
        
        echo '<p>' . __('You will be redirect to the system. If not, click :x', ['x' => "<a href='" . route('systemUpdate.upgrade', ['waiting' => true]) . "'>" . __('here') . '</a>']) . "</p><meta http-equiv=\"refresh\" content=\"5;URL='" . route('systemUpdate.upgrade', ['waiting' => true]) . "'\" />";
        exit;
    }
    
    $sourceFile = 'modules_statuses.json';
    $destinationFile = 'modules.json';
    $destinationDirectory = 'Modules';

    // Get the base path and the destination path
    $basePath = base_path($sourceFile);
    $destinationPath = base_path($destinationDirectory . DIRECTORY_SEPARATOR . $destinationFile);

    // Check if the file exists before attempting to move it
    if (\Illuminate\Support\Facades\File::exists($basePath)) {
        // Move the file
        \Illuminate\Support\Facades\File::move($basePath, $destinationPath);
    }
    
    // Add Bulk Payment to modules.json
    $jsonData = json_decode(file_get_contents($destinationPath), true);

    // Add the new key-value pair
    $jsonData['BulkPayment'] = true;
    $jsonData['Inventory'] = true;
    $jsonData['Delivery'] = true;
    $jsonData['AdvanceReport'] = true;

    // Convert the data back to JSON format
    $newJsonData = json_encode($jsonData, JSON_PRETTY_PRINT);

    // Write the updated JSON data back to the file
    file_put_contents($destinationPath, $newJsonData);
}

function afterUpgrade(){
    $directoryPath = storage_path('fonts');

    // Check if the directory already exists
    if (!\Illuminate\Support\Facades\File::exists($directoryPath)) {
        // Create the directory
        \Illuminate\Support\Facades\File::makeDirectory($directoryPath, 0777, true, true);
    }
    // Set permissions (if needed, in case makeDirectory doesn't set it to 777)
    chmod($directoryPath, 0777);
    
    Artisan::call('module:migrate ' . 'Inventory');
    Artisan::call('module:seed ' . 'Inventory');
    Artisan::call('module:migrate ' . 'Delivery');
    Artisan::call('module:seed ' . 'Delivery');
    Artisan::call('module:seed ' . 'AdvanceReport');
}

