<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\location;
use App\Models\User;
use App\Models\userLocation;
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
        \App\Models\User::factory(5)->create();

        location::factory(4)->create();

        $roles = User::all();

        // Populate the pivot table
        location::all()->each(function ($location) use ($roles) { 
            $location->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
