<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Http\Models\User;
use App\Http\Models\Role;
use App\Http\Models\JobPosition;
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
        $this->call('DummyUserSeeder');
		$this->call('JobPositionsTableSeeder');
		$this->call('PeopleTableSeeder');

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

class JobPositionsTableSeeder extends Seeder {

	public function run() {
		JobPosition::create(['name' => 'Employee']);
		JobPosition::create(['name' => 'Boss']);
	}
}

class PeopleTableSeeder extends Seeder {

	public function run() {
		$john = Person::create([
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

		if($john) {
			$john->giveJobPosition("Employee");
		}

		$jane = Person::create([
			'first_name' => 'Jane',
			'last_name' => 'Smith',
			'dob' => '337564800',
			'gender' => 'f',
			'email' => 'jane@smith.local',
			'address1' => '12 Main Street',
			'city' => 'London',
			'zip' => 'NW1 1AC',
			'country' => 'United Kingdom',
		]);

		if($jane) {
			$jane->giveJobPosition("Boss");
		}
	}
}

class DummyUserSeeder extends Seeder {
	
	public function run()
	{
		$user = User::create([
			'name' => 'Progress Administrator',
			'email' => 'administrator@progress.local',
			'password' => Hash::make('password'),
		]);

		if($user)
		{
			$user->assignRole('user');
		}

		$this->command->info('Administration user created. Username: administrator@progress.local, password: password.');
	}

}


