<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Video Production',
                'desc' => "Our expert video production services bring your vision to life, whether it's for promotional videos, social media content, or corporate presentations.",
                'icon' => 'fa-film',
            ],
            [
                'name' => 'Photography',
                'desc' => "Our photography services ensure to capture the essence of every moment. Our photographers do corporate events to portraits and lifestyle shoots.",
                'icon' => 'fa-camera',
            ],
            [
                'name' => 'Graphic Design',
                'desc' => "Our team excels in creating eye-catching visuals, from social media graphics to blending artistic flair strategically for stunning & effective designs.",
                'icon' => 'fa-paint-brush',
            ],
            [
                'name' => 'Sound Design',
                'desc' => "Our team of skilled sound designers specializes in creating immersive audio experiences, from custom soundtracks, effects, voiceovers & mixing.",
                'icon' => 'fa-microphone',
            ],
            [
                'name' => 'Song Writing',
                'desc' => "Our talented songwriters specialize in crafting original lyrics & melodies across genres, ensuring each composition resonates with your audience.",
                'icon' => 'fa-pencil',
            ],
            [
                'name' => 'Live Broadcasting',
                'desc' => "Our Live Broadcasting Service delivers seamless, high-quality live video streams to your audience, anywhere and anytime. Whether it's a corporate event or personal celebration.",
                'icon' => 'fa-video-camera',
            ],
        ];

        foreach ($services as $service) {
            Service::factory()->create($service);
        }
    }
}
