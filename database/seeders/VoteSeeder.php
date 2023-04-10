<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(\App\Models\Vote::all()) > 0) {
            return;
        }

        $faker = \Faker\Factory::create();

        for($i = 1; $i < 200; $i++) {
            $vote = new \App\Models\Vote();
            $vote->user_id = \App\Models\User::inRandomOrder()->first()->id;
            $vote->transaction_id = Str::slug($faker->text(20));
            $vote->amount = $faker->randomElement([200, 400, 1000, 6000]);
            $vote->save();
        }

    }
}
