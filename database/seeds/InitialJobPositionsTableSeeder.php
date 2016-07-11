<?php

use Illuminate\Database\Seeder;

class InitialJobPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\JobPosition::create(['name' => 'Employee']);
        \App\Models\JobPosition::create(['name' => 'Boss']);
    }
}
