<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'title' => 'Minecraft',
                'category' => 'Sandbox',
                'size_mb' => 400,
                'image_path' => 'games/minecraft.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Call of Duty: Warzone',
                'category' => 'Battle Royale',
                'size_mb' => 102400,
                'image_path' => 'games/cod_warzone.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Dota 2',
                'category' => 'MOBA',
                'size_mb' => 15000,
                'image_path' => 'games/dota2.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Valorant',
                'category' => 'FPS',
                'size_mb' => 22000,
                'image_path' => 'games/valorant.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Sims 4',
                'category' => 'Simulation',
                'size_mb' => 50000,
                'image_path' => 'games/sims4.jpg',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Grand Theft Auto V',
                'category' => 'Action-Adventure',
                'size_mb' => 95000,
                'image_path' => 'games/gta5.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'League of Legends',
                'category' => 'MOBA',
                'size_mb' => 12500,
                'image_path' => 'games/lol.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'PUBG',
                'category' => 'Battle Royale',
                'size_mb' => 30000,
                'image_path' => 'games/pubg.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'FIFA 23',
                'category' => 'Sports',
                'size_mb' => 45000,
                'image_path' => 'games/fifa23.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fortnite',
                'category' => 'Battle Royale',
                'size_mb' => 27000,
                'image_path' => 'games/fortnite.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cyberpunk 2077',
                'category' => 'RPG',
                'size_mb' => 70000,
                'image_path' => 'games/cyberpunk2077.jpg',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Among Us',
                'category' => 'Party',
                'size_mb' => 250,
                'image_path' => 'games/among_us.jpg',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
