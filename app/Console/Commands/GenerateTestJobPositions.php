<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateTestJobPositions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:job-positions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 10 random job positions and enter them into the database.';

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
        Artisan::call('db:seed', [
            '--class' => 'TestingJobPositionsTableSeeder'
        ]);

        $this->info('Ten random job positions have been added to the database.');
    }
}
