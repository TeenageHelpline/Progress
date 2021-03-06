<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\JobPosition;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard() is no longer required since 5.2
        
		$this->call(InitialRolesTableSeeder::class);
		$this->call(InitialJobPositionsTableSeeder::class);
		$this->call(InitialUsersTableSeeder::class);
    }
}


