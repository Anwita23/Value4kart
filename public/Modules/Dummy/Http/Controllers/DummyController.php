<?php

namespace Modules\Dummy\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Dummy\Database\Seeders\DummyImportDatabaseSeeder;

class DummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('dummy::index');
    }

    /**
     * Store Dummy data.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        \DB::beginTransaction();

        try {
            (new DummyImportDatabaseSeeder())->run();

            \File::copyDirectory(module_path('Dummy', 'Resources/assets/seeder/'), public_path('uploads/'));

            \Artisan::call('optimize:clear');
            \DB::commit();

            return redirect()->route('dashboard')->withSuccess(__('Dummy data successfully imported.'));
        } catch (\Exception $e) {
            \DB::rollBack();

            return redirect()->route('dashboard')->withFail($e->getMessage());
        }
    }
}
