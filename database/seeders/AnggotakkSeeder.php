<?php

namespace Database\Seeders;

use App\Models\Anggotakk;
use App\Models\Hubungankk;
use App\Models\Kk;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotakkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $randomKk = Kk::inRandomOrder()->first();
        $randomPenduduk = Penduduk::inRandomOrder()->first();
        $randomHubungankk = Hubungankk::inRandomOrder()->first();
        $randomUser = User::inRandomOrder()->first();

        for ($i = 0; $i < 5; $i++) {
            Anggotakk::create([
                'kk_id' => $randomKk->id,
                'penduduk_id' => $randomPenduduk->id,
                'hubungankk_id' => $randomHubungankk->id,
                'statusaktif' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
                'user_id' => $randomUser->id
            ]);
        }
    }
}
