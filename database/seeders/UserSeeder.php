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


        // $cover_storage_path = storage_path('app/public/users');
        // File::isDirectory($cover_storage_path) or File::makeDirectory($cover_storage_path, 0777, true, true);
        // $faker = \Faker\Factory::create();

        // for($i = 0; $i < 10; $i++){
        //     $user = new \App\Models\User();
        //     $user->name = $faker->name();
        //     $user->slug = Str::slug($user->name);
        //     $user->phone = $faker->phoneNumber();
        //     $user->contestant_number = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]);
        //     $user->address = $faker->address();
        //     $user->profession = $faker->jobTitle();
        //     $user->image = $faker->file(public_path('samples/users'), $cover_storage_path, false);
        //     $user->alt_image = $faker->file(public_path('samples/users'), $cover_storage_path, false);
        //     $user->modal_image = $faker->file(public_path('samples/users'), $cover_storage_path, false);
        //     $user->save();

        // }


 /*
        Frederick Houag K
        Cont-01-Frederick-Houag-K.jpg
        Cont-01-flier.jpg

        Enownjang Lucyaron
        Cont-02-Enownjang-Lucyaron.jpg
        Cont-02-flier.jpg

        Nifuan Precious Kikeh
        Cont-03-Nifuan-Precious-Kikeh.jpg
        Cont-03-flier.jpg

        Besong Perelyne
        Cont-04-Besong-Perelyne.jpg
        Cont-04-flier.jpg

        Yashmin Aruna
        Cont-05-Yashmin-Aruna.jpg
        Cont-05-flier.jpg

        Forlemu Sendy Nzebelai
        Cont-06-Forlemu-Sendy-Nzebelai.jpg
        Cont-06-flier.jpg

        Chia Doreen
        Cont-07-Chia-Doreen.jpg
        Cont-07-flier.jpg

        Asongwe Khalene
        Cont-08-Asongwe-Khalene.jpg
        Cont-08-flier.jpg

        Enongene Trecy
        Cont-09-Enongene-Trecy.jpg
        Cont-09-flier.jpg

        Ngum Mafo Angwafo
        Cont-10-Ngum-Mafo-Angwafo.jpg
        Cont-10-flier.jpg

        Tracy Nyofi
        Cont-11-Tracy-Nyofi.jpg
        Cont-11-flier.jpg


        Atabejah Ethel Epede
        Cont-12-Atabejah-Ethel-Epede.jpg
        Cont-12-flier.jpg


        Tih Cloudatt
        Cont-13-Tih-Cloudatt.jpg
        Cont-13-flier.jpg

        Bidie Marie Telma
        Cont-14-Bidie-Marie-Telma.jpg
        Cont-14-flier.jpg

        Nchine Juliette
        Cont-15-Nchine-Juliette.jpg
        Cont-15-flier.jpg
        */



        $users = [
            [
                "name" => "Frederick Houag K",
                "slug" => "frederick-houag",
                "image" => "Cont-01-Frederick-Houag-K.jpg",
                "alt_image" => "Cont-01-flier.jpg",
                "modal_image" => "Cont-01.jpg",
                "contestant_number" => 1
            ],
            [
                "name" => "Enownjang Lucyaron",
                "slug" => "enownjang-lucyaron",
                "image" => "Cont-02-Enownjang-Lucyaron.jpg",
                "alt_image" => "Cont-02-flier.jpg",
                "modal_image" => "Cont-02.jpg",
                "contestant_number" => 2
            ],
            [
                "name" => "Nifuan Precious Kikeh",
                "slug" => "nifuan-precious",
                "image" => "Cont-03-Nifuan-Precious-Kikeh.jpg",
                "alt_image" => "Cont-03-flier.jpg",
                "modal_image" => "Cont-03.jpg",
                "contestant_number" => 3
            ],
            [
                "name" => "Besong Perelyne",
                "slug" => "besong-perelyne",
                "image" => "Cont-04-Besong-Perelyne.jpg",
                "alt_image" => "Cont-04-flier.jpg",
                "modal_image" => "Cont-04.jpg",
                "contestant_number" => 4
            ],
            [
                "name" => "Yashmin Aruna",
                "slug" => "yashmin-aruna",
                "image" => "Cont-05-Yashmin-Aruna.jpg",
                "alt_image" => "Cont-05-flier.jpg",
                "modal_image" => "Cont-05.jpg",
                "contestant_number" => 5
            ],
            [
                "name" => "Forlemu Sendy Nzebelai",
                "slug" => "forlemu-sendy",
                "image" => "Cont-06-Forlemu-Sendy-Nzebelai.jpg",
                "alt_image" => "Cont-06-flier.jpg",
                "modal_image" => "Cont-06.jpg",
                "contestant_number" => 6
            ],
            [
                "name" => "Chia Doreen",
                "slug" => "chia-doreen",
                "image" => "Cont-07-Chia-Doreen.jpg",
                "alt_image" => "Cont-07-flier.jpg",
                "modal_image" => "Cont-07.jpg",
                "contestant_number" => 7
            ],
            [
                "name" => "Asongwe Khalene",
                "slug" => "asongwe-khalene",
                "image" => "Cont-08-Asongwe-Khalene.jpg",
                "alt_image" => "Cont-08-flier.jpg",
                "modal_image" => "Cont-08.jpg",
                "contestant_number" => 8
            ],
            [
                "name" => "Enongene Trecy",
                "slug" => "enongene-trecy",
                "image" => "Cont-09-Enongene-Trecy.jpg",
                "alt_image" => "Cont-09-flier.jpg",
                "modal_image" => "Cont-09.jpg",
                "contestant_number" => 9
            ],
            [
                "name" => "Ngum Mafo Angwafo",
                "slug" => "ngum-mafo",
                "image" => "Cont-10-Ngum-Mafo-Angwafo.jpg",
                "alt_image" => "Cont-10-flier.jpg",
                "modal_image" => "Cont-10.jpg",
                "contestant_number" => 10
            ],
            [
                "name" => "Tracy Nyofi",
                "slug" => "tracy-nyofi",
                "image" => "Cont-11-Tracy-Nyofi.jpg",
                "alt_image" => "Cont-11-flier.jpg",
                "modal_image" => "Cont-11.jpg",
                "contestant_number" => 11
            ],
            [
                "name" => "Atabejah Ethel Epede",
                "slug" => "atabejah-ethel",
                "image" => "Cont-12-Atabejah-Ethel-Epede.jpg",
                "alt_image" => "Cont-12-flier.jpg",
                "modal_image" => "Cont-12.jpg",
                "contestant_number" => 12
            ],
            [
                "name" => "Tih Cloudatt",
                "slug" => "tih-cloudatt",
                "image" => "Cont-13-Tih-Cloudatt.jpg",
                "alt_image" => "Cont-13-flier.jpg",
                "modal_image" => "Cont-13.jpg",
                "contestant_number" => 13
            ],
            [
                "name" => "Bidie Marie Telma",
                "slug" => "bidie-marie",
                "image" => "Cont-14-Bidie-Marie-Telma.jpg",
                "alt_image" => "Cont-14-flier.jpg",
                "modal_image" => "Cont-14.jpg",
                "contestant_number" => 14
            ],
            [
                "name" => "Nchine Juliette",
                "slug" => "nchine-juliette",
                "image" => "Cont-15-Nchine-Juliette.jpg",
                "alt_image" => "Cont-15-flier.jpg",
                "modal_image" => "Cont-15.jpg",
                "contestant_number" => 15
            ],

        ];


        foreach($users as $user){
            \App\Models\User::create($user);
        }





    }
}
