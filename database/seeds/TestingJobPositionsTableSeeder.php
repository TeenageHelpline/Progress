<?php

use Illuminate\Database\Seeder;

class TestingJobPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create('en_GB');

        for($i = 0; $i < 10; $i++) {
            // Ensure the same job position isn't added twice, as this would throw an error since
            // the job position name field is now unique.
            do {
                $name = $faker->jobTitle;
            }
            while(\App\Models\JobPosition::where('name', '=', $name)->count() > 0);

            // Add the job position
            \App\Models\JobPosition::create(['name' => $name]);
        }
    }
}
