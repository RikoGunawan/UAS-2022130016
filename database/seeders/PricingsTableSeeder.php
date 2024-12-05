<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PricingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pricings')->insert([
            [
                'plan_name' => 'Quick Play',
                'price' => 5000.00,
                'duration_minutes' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_name' => 'Main Santai',
                'price' => 8000.00,
                'duration_minutes' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_name' => 'Harian Happy',
                'price' => 20000.00,
                'duration_minutes' => 720,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_name' => 'No Limit',
                'price' => 50000.00,
                'duration_minutes' => 1440,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
