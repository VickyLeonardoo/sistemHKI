<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID'); // Menggunakan namespace penuh untuk instansiasi Faker

        for ($i = 1; $i <= 10; $i++) {
            // insert data ke table pendetas menggunakan Faker
            DB::table('pendetas')->insert([
                'nama' => $faker->name,
                'tempatLahir' => $faker->city,
                'tglLahir' => $faker->date($format = 'Y-m-d', $max = 'now'), // Menggunakan date() untuk tanggal
                'status' => 'Pendeta Resort',
                'tglMasuk' => $faker->date($format = 'Y-m-d', $max = 'now'), // Menggunakan date() untuk tanggal
                'slug' => Str::slug($faker->name) // Menggunakan Str::slug untuk membuat slug dari nama
            ]);
        }
    }

}
