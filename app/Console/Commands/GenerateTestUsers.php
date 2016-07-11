<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateTestUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add 25 random users to the database for testing.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'TestingUsersTableSeeder'
        ]);

        $this->info('Twenty five random users have been added to the database.');
    }
}
