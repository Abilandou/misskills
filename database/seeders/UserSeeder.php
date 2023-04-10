<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(\App\Models\User::all()) > 0) {
            return;
        }


        $cover_storage_path = storage_path('app/public/users');
        File::isDirectory($cover_storage_path) or File::makeDirectory($cover_storage_path, 0777, true, true);
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
            $user = new \App\Models\User();
            $user->name = $faker->name();
            $user->slug = Str::slug($user->name);
            $user->phone = $faker->phoneNumber();
            $user->contestant_number = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]);
            $user->address = $faker->address();
            $user->profession = $faker->jobTitle();
            $user->image = $faker->file(public_path('samples/users'), $cover_storage_path, false);
            $user->alt_image = $faker->file(public_path('samples/users'), $cover_storage_path, false);
            $user->save();

        }
    }
}
