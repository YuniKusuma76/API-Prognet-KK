<?php

namespace Database\Seeders;

use App\Models\Hubungankk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubungankkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 3; $i++) {
            Hubungankk::create([
                'hubungankk' => $faker->sentence
            ]);
        }
    }
}
