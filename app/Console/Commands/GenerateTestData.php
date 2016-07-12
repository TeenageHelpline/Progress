<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateTestData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate test data for all relevant tables.';

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
        //
        Artisan::call('test:job-positions');
        Artisan::call('test:users');
    }
}
