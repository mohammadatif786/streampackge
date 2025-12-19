<?php

namespace Vendor\StreamPackage;

use Illuminate\Support\ServiceProvider;

class StreamPackageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Merge config stays in register
        $this->mergeConfigFrom(__DIR__ . '/../config/streampackage.php', 'streampackage');
    }

    public function boot(): void
    {
        // Load Resources
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'streampackage');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Publishing Assets
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/streampackage.php' => config_path('streampackage.php')
            ], 'streampackage-config');

            $this->publishes([
                __DIR__ . '/database/migrations/' => database_path('migrations')
            ], 'streampackage-migrations');

            $this->publishes([
                __DIR__ . '/database/seeders/StreamSeeder.php' => database_path('seeders/StreamSeeder.php'),
            ], 'streampackage-seeders');

            $this->commands([
                \Vendor\StreamPackage\Console\InstallStreamPackage::class,
            ]);
        }
    }
}
