<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            "email"=>'admin@admin',
            "password"=>'admin',
            "avatar"=>'sdfsdf',
            "role"=>'admin',
        ]);
        Recipe::create([
            "user_id"=>'1',
            "name"=>'Борщ',
            "description"=>'ммм вкусный борщик',
            "cooktime"=>'60',
            "difficulty"=>'Средне',
            "photo"=>'/images/borsh.jpg',
        ]);
        Recipe::create([
            "user_id"=>'1',
            "name"=>'Соляночка',
            "description"=>'ммм вкусный соляночка',
            "cooktime"=>'30',
            "difficulty"=>'Легко',
            "photo"=>'/images/solyanka.jpg',
        ]);
        Recipe::create([
            "user_id"=>'1',
            "name"=>'Чебречки',
            "description"=>'ммм вкусный чебрек',
            "cooktime"=>'10',
            "difficulty"=>'Легко',
            "photo"=>'/images/cheburek.jpg',
        ]);
        Recipe::create([
            "user_id"=>'1',
            "name"=>'Соляночка',
            "description"=>'ммм вкусный соляночка',
            "cooktime"=>'30',
            "difficulty"=>'Легко',
            "photo"=>'/images/salatikburmaldatik.jpg',
        ]);
    }
}
