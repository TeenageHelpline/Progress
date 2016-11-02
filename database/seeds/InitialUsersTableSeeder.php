<?php

use Illuminate\Database\Seeder;

class InitialUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_GB');

        $user = \App\Models\User::create([
            'email' => 'administrator@progress.local',
            'personal_email' => $faker->safeEmail,
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'first_name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'dob' => $faker->dateTimeBetween('-30 years', 'now'),
            'gender' => 'f',
            'address1' => $faker->streetAddress,
            'city' => $faker->city,
            'state' => 'Any State',
            'zip' => $faker->postcode,
            'country' => 'United Kingdom',
            'personal_telephone' => $faker->mobileNumber,
            'work_telephone' => $faker->phoneNumber
        ]);

        if($user)
        {
            // Generate and save image
            $path = 'people/'.$user->id.'/face.jpg';
            \Illuminate\Support\Facades\Storage::put($path, file_get_contents('http://api.adorable.io/avatar/400/'.md5($user->id.$user->email).''));

            $user->image_path = $path;
            $user->save();

            $user->roles()->attach(\App\Models\Role::where('name', '=','admin')->first(), ['primary' => true]);
            $user->jobPositions()->attach(\App\Models\JobPosition::where('name', '=', 'Boss')->first(), ['primary' => true]);
        }

        $this->command->info('Administration user created. Username: administrator@progress.local, password: password.');
    }
}
