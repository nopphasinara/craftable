<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database with default data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('down');

        $this->call('migrate:fresh', [
            '-n' => true,
            '--force' => true,
            '--seed' => true,
        ]);

        $this->call('admin-translations:scan-and-save', [
            '-n' => true,
        ]);

        $this->call('cache:clear');

        File::deleteDirectory(public_path('media'), true);

        $this->call('up');
    }
}
