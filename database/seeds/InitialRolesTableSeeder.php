<?php

use Illuminate\Database\Seeder;

class InitialRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(['name' => 'User', 'description' => 'Regular user']);
        \App\Models\Role::create(['name' => 'Admin', 'description' => 'Administrator']);
    }
}
