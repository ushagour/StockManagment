<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 5; $i++) {
            $randomNumber = rand(100, 200);
           //creating teams of hospital  
            $team = Team::factory()->create([
                'name' => "Hospital $randomNumber",
            ]);

            //director  and doctor for the team above
            $director = User::factory()->create([
                'name'           => "Director $randomNumber",
                'email'          => "director$randomNumber@gmail.com",
                'password'       => bcrypt('password'),
                'team_id'        => $team->id,
                'remember_token' => null,
            ]);
            $director->roles()->sync(2);
           
            $doctor = User::factory()->create([
                'name'           => "Doctor $randomNumber",
                'email'          => "doctor$randomNumber@gmail.com",
                'password'       => bcrypt('password'),
                'team_id'        => $team->id,
                'remember_token' => null,
            ]);
            $doctor->roles()->sync(2);
         }
    }
}
