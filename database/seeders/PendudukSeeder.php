<?php

namespace Database\Seeders;

use App\Models\Agama;
use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $randomAgama = Agama::inRandomOrder()->first();
        for ($i = 0; $i < 5; $i++) {
            Penduduk::create([
                'nik' => $faker->sentence,
                'nama' => $faker->sentence,
                'alamat' => $faker->address,
                'lahir' => $faker->date,
                'agama_id' => $randomAgama->id
            ]);
        }
    }
}
