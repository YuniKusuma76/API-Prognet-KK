<?php

namespace Database\Seeders;

use App\Models\Kk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 5; $i++) {
            Kk::create([
                'nokk' => $faker->sentence,
                'statusaktif' => $faker->randomElement(['Aktif', 'Tidak Aktif'])
            ]);
        }
    }
}
