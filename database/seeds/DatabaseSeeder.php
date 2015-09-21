<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Http\Models\User;
use App\Http\Models\Role;
use App\Http\Models\Jobposition;
use App\Http\Models\Person;

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
		$this->call('JobpositionsTableSeeder');
        $this->call('DummyUserSeeder');

        Model::reguard();
    }
}

class RoleTableSeeder extends Seeder {

	public function run()
	{
		Role::create(['name' => 'user', 'description' => 'Regular user']);
		Role::create(['name' => 'admin', 'description' => 'Administrator']);
	}

}

class JobpositionsTableSeeder extends Seeder {

	public function run() {
		Jobposition::create(['name' => 'Employee']);
		Jobposition::create(['name' => 'Boss']);
	}
}

class DummyUserSeeder extends Seeder {
	
	public function run()
	{
		$john = User::create([
			'password' => Hash::make('asdasd'),
			'first_name' => 'John',
			'last_name' => 'Smith',
			'dob' => '336787200',
			'gender' => 'm',
			'email' => 'john@smith.local',
			'address1' => '10 Main Street',
			'city' => 'London',
			'zip' => 'NW1 1AB',
			'country' => 'United Kingdom',
		]);

		if($john)
		{
			$john->assignRole('login');
			$john->giveJobPosition('Employee');
		}

		$jane = User::create([
			'email' => 'administrator@progress.local',
			'password' => Hash::make('password'),
			'first_name' => 'Jane',
			'last_name' => 'Smith',
			'dob' => '337564800',
			'gender' => 'f',
			'address1' => '12 Main Street',
			'city' => 'London',
			'zip' => 'NW1 1AC',
			'country' => 'United Kingdom',
		]);

		if($jane)
		{
			$jane->assignRole('login');
			$jane->assignRole('admin');
			$jane->giveJobPosition("Boss");
		}

		$this->command->info('Administration user created. Username: administrator@progress.local, password: password.');
	}

}


