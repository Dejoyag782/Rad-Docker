<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['service_id' => '1', 'role_name' => 'Videographer'],
            ['service_id' => '1', 'role_name' => 'Video Editor'],
            ['service_id' => '1', 'role_name' => 'Cinematographer'],
            ['service_id' => '2', 'role_name' => 'Photographer'],
            ['service_id' => '2', 'role_name' => 'Photo Editor'],
            ['service_id' => '3', 'role_name' => 'Graphic Designer'],
            ['service_id' => '4', 'role_name' => 'SFX Designer'],
            ['service_id' => '4', 'role_name' => 'Music Designer'],
            ['service_id' => '4', 'role_name' => 'Audio Editor'],            
            ['service_id' => '5', 'role_name' => 'Song Writer'],            
            ['service_id' => '5', 'role_name' => 'Song Composer'],            
            ['service_id' => '6', 'role_name' => 'Camera Operator'],            
            ['service_id' => '6', 'role_name' => 'Live Operator'],
        ];

        foreach ($roles as $role) {
            Role::factory()->create($role);
        }

    }
}
