<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Dummy\Http\Controllers\DummyController;

Route::group(['middleware' => ['auth', 'locale', 'permission', 'web']], function () {
    Route::get('/import/dummy-data', [DummyController::class, 'index'])->name('import.dummy');
    Route::post('/import/dummy-data', [DummyController::class, 'store'])->name('import.dummy.store');
});
