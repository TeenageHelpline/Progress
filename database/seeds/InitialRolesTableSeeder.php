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
        \App\Models\Role::create(['name' => 'user', 'description' => 'Regular user']);
        \App\Models\Role::create(['name' => 'admin', 'description' => 'Administrator']);
    }
}
