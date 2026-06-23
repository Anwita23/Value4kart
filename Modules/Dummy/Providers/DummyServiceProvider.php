<?php

namespace Modules\Dummy\Providers;

use Illuminate\Support\ServiceProvider;

class DummyServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        add_action('admin_add_import_data_card', function () {
            echo view('dummy::import-data-card');
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {}
}
