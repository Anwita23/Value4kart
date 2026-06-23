<?php

namespace Modules\Dummy\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Dummy\Database\Seeders\{
    Core\DatabaseSeeder as CoreDatabaseSeeder,
    Modules\DatabaseSeeder as ModulesDatabaseSeeder
};

class DummyImportDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CoreDatabaseSeeder::class);
        $this->call(ModulesDatabaseSeeder::class);

        $this->runAdditionalSeeders();

        if (file_exists('Modules\Credential\Database\Seeders\CredentialDatabaseSeeder.php')) {
            (new \Modules\Credential\Database\Seeders\CredentialDatabaseSeeder())->run();
        }
    }

    /**
     * Runs additional seeders for enabled addons.
     */
    private function runAdditionalSeeders(): void
    {
        $enabledAddons = $this->enableAddons();

        foreach ($enabledAddons as $addon) {
            $addonName = $addon->get('name');

            $class = 'Modules\\' . $addonName . '\Database\Seeders\\' . $addonName . 'DatabaseSeeder';
            if (class_exists($class)) {
                (new $class())->run();
            }
        }
    }

    /**
     * Retrieve and return the list of enabled addons.
     */
    private function enableAddons(): array
    {
        return array_filter(\Modules\Addons\Entities\Addon::all(), fn ($addon) => ! $addon->get('core') && $addon->isEnabled());
    }
}
