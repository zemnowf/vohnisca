<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Campaign;
use App\Models\Encounter;
use App\Models\Note;
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
        $users = User::factory(1)->create();

        $campaigns = Campaign::factory(2)->create([
            'user_id' => $users->random()->id,
        ]);

        $encounters = Encounter::factory(4)->create([
            'campaign_id' => $campaigns->random()->id,
        ]);

        $notes = Note::factory(6)->create([
            'encounter_id' => $encounters->random()->id,
            'user_id' => $users->random()->id,
        ]);

        AdminUser::firstOrCreate([
            "name" => "Master",
            "email" => "master@example.com",
            "password" => bcrypt("djuybixf1"),
        ]);
    }
}
