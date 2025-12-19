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

        // 1. Publish Config
        $this->info('Publishing configuration...');
        $this->call('vendor:publish', [
            '--provider' => "Vendor\StreamPackage\StreamPackageServiceProvider",
            '--tag' => "streampackage-config"
        ]);

        // 2. Publish Migrations
        $this->info('Publishing migrations...');
        $this->call('vendor:publish', [
            '--provider' => "Vendor\StreamPackage\StreamPackageServiceProvider",
            '--tag' => "streampackage-migrations"
        ]);

        $this->info('StreamPackage installed successfully.');
    }
}
