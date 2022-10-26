<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        location::factory(4)->create();

        $roles = location::all();

        // Populate the pivot table
        User::all()->each(function ($user) use ($roles) { 
            $user->locations()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
