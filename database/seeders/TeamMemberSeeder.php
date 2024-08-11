<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => "Dex Joshua Curayag",
                'photo' => null,
                'linked_in' => null,
            ],
            [
                'name' => "Rogelio Tasong Jr.",
                'photo' => null,
                'linked_in' => null,
            ],
            [
                'name' => "Aleksandr Memphis Olaguir",
                'photo' => null,
                'linked_in' => null,
            ]
        ];

        foreach ($members as $member) {
            Team::factory()->create($member);
        }
    }
}
