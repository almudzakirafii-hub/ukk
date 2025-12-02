<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@garuda.test',
            'role' => 'admin',
        ]);

        // Create member users
        User::factory(5)->create([
            'role' => 'member',
        ]);

        // Create team
        $team = \App\Models\Team::create([
            'name' => 'Garuda Hustler',
            'slug' => 'garuda-hustler',
            'description' => 'Tim basket dari SMK Negeri 1 Garut yang berbakat dan bersemangat dalam mengembangkan prestasi olahraga basket.',
            'founded_year' => '2020',
            'achievements' => 'Juara Basket SMKN 1 Garut 2024, Peserta LKB Regional 2024',
        ]);

        // Create players
        $players = [
            ['name' => 'Ahmad Rasyid', 'jersey_number' => '1', 'position' => 'Point Guard'],
            ['name' => 'Budi Santoso', 'jersey_number' => '2', 'position' => 'Shooting Guard'],
            ['name' => 'Citra Wijaya', 'jersey_number' => '3', 'position' => 'Small Forward'],
            ['name' => 'Doni Pratama', 'jersey_number' => '4', 'position' => 'Power Forward'],
            ['name' => 'Eka Saputra', 'jersey_number' => '5', 'position' => 'Center'],
        ];

        foreach ($players as $player) {
            $team->players()->create([
                'name' => $player['name'],
                'jersey_number' => $player['jersey_number'],
                'position' => $player['position'],
                'height' => rand(170, 200),
                'weight' => rand(65, 90),
                'status' => 'active',
            ]);
        }

        // Create matches
        $team->matches()->create([
            'opponent' => 'SMKN 2 Garut',
            'match_date' => now()->addDays(7),
            'location' => 'Stadion SMKN 1 Garut',
            'type' => 'home',
            'status' => 'scheduled',
        ]);

        $team->matches()->create([
            'opponent' => 'SMKN 3 Bandung',
            'match_date' => now()->subDays(7),
            'location' => 'Stadion SMKN 3 Bandung',
            'type' => 'away',
            'status' => 'completed',
            'team_score' => 68,
            'opponent_score' => 65,
        ]);
    }
}
