<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Test User',
            'email' => 'test@example.com',
            'user_type' => 'ad',
            'password' => bcrypt('superadmin')],
            ['name' => 'Test User2',
            'email' => 'test2@example.com',
            'user_type' => 'mod',
            'password' => bcrypt('moderator')],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }

    }
}
