<?php

namespace Vendor\StreamPackage\Database\Seeders;

use Illuminate\Database\Seeder;
use Vendor\StreamPackage\Models\Stream;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stream::create([
            'title' => 'First Live Stream',
            'slug' => 'first-live-stream',
            'description' => 'This is a test stream seeded from the package.',
            'is_live' => true,
        ]);

        Stream::create([
            'title' => 'Gaming Session',
            'slug' => 'gaming-session',
            'description' => 'Upcoming gaming stream.',
            'is_live' => false,
        ]);
    }
}
