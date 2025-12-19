<?php

namespace Vendor\StreamPackage\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallStreamPackage extends Command
{
    // The name and signature of the console command
    protected $signature = 'stream:install';

    // The console command description
    protected $description = 'Install the StreamPackage assets and config';

    public function handle()
    {
        $this->info('Installing StreamPackage...');

        // Publish Config
        $this->info('Publishing configuration...');
        $this->call('vendor:publish', [
            '--provider' => "Vendor\StreamPackage\StreamPackageServiceProvider",
            '--tag' => "streampackage-config"
        ]);

        // Publish Migrations
        $this->info('Publishing migrations...');
        $this->call('vendor:publish', [
            '--provider' => "Vendor\StreamPackage\StreamPackageServiceProvider",
            '--tag' => "streampackage-migrations"
        ]);

        // Publish Assets
        $this->info('Publishing assets...');
        $this->call('vendor:publish', [
            '--provider' => "Vendor\StreamPackage\StreamPackageServiceProvider",
            '--tag' => "streampackage-assets"]);

        // Publish Views
        $this->info('Publishing views...');
        $this->call('vendor:publish', [
            '--provider' => "Vendor\StreamPackage\StreamPackageServiceProvider",
            '--tag' => "streampackage-views"
        ]);

        $this->info('StreamPackage installed successfully.');
    }
}
