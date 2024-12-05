<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('computers')->insert([
            [
                'name' => 'PC-01',
                'location' => 'Corner near entrance',
                'specifications' => 'Intel Core i3, 8GB RAM, GTX 750Ti, 500GB SSD',
                'tier' => 'tier_1',
                'image_path' => 'computers/lowend_01.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC-02',
                'location' => 'Middle row, seat 3',
                'specifications' => 'Intel Core i5, 16GB RAM, GTX 1050Ti, 1TB HDD',
                'tier' => 'tier_2',
                'image_path' => 'computers/standard_02.jpg',
                'status' => 'in_use',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC-03',
                'location' => 'VIP room, seat 1',
                'specifications' => 'Intel Core i7, 32GB RAM, RTX 3070, 1TB SSD',
                'tier' => 'tier_3',
                'image_path' => 'computers/highend_03.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC-04',
                'location' => 'Near snack area',
                'specifications' => 'Intel Core i5, 16GB RAM, GTX 1650, 1TB HDD',
                'tier' => 'tier_2',
                'image_path' => 'computers/standard_04.jpg',
                'status' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PC-05',
                'location' => 'Back row, seat 7',
                'specifications' => 'Intel Core i9, 64GB RAM, RTX 4090, 2TB SSD',
                'tier' => 'tier_3',
                'image_path' => 'computers/highend_05.jpg',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
