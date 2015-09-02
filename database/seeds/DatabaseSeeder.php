<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Http\Models\User;
use App\Http\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('DummyUserSeeder');

        Model::reguard();
    }
}

class RoleTableSeeder extends Seeder {

	public function run()
	{
		Role::create(['name' => 'login', 'description' => 'The login priviledge. Regular user.']);
		Role::create(['name' => 'admin', 'description' => 'Admins.']);
	}

}

class DummyUserSeeder extends Seeder {
	
	public function run()
	{
		$user = User::create([
			'firstname' => 'Dummy',
			'lastname' => 'User',
			'email' => 'user@example.com',
			'address1' => 'Address line 1',
			'address2' => 'Address line 2',
			'zip' => 1234,
			'city' => 'Cityname',
			'dob' => time()
		]);
		if($user)
		{
			$user->assignRole('login');
		}
		$this->command->info('Dummy user created');
	}

}


