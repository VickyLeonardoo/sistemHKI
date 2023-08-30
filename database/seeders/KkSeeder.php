<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID'); // Menggunakan namespace penuh untuk instansiasi Faker
        $kkWithHead = [];
        $kkWithMother = [];

        for ($i = 1; $i <= 50; $i++) {
            // insert data ke table pendetas menggunakan Faker
            $kkId = DB::table('kks')->insertGetId([
                'nomorKk' => $faker->unique()->nik(),
                'alamat' => $faker->address,
                'kecamatan' => $faker->city,
                'kelurahan' => $faker->city,
                'wijk_id' => random_int(1, 3), // Menggunakan random_int() untuk angka acak
                'statusRumah' => 'Rumah Sendiri'
            ]);

            if (!in_array($kkId, $kkWithHead)) {
                DB::table('jemaats')->insert([
                    'kk_id' => $kkId,
                    'nik' => $faker->unique()->nik(),
                    'nama' => $faker->name,
                    'tempatLahir' => $faker->city,
                    'tglLahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'jenisKelamin' => 'Pria',
                    'golDarah' => 'A',
                    'pekerjaan' => $faker->jobTitle,
                    'statusKeluarga' => 'Kepala Keluarga',
                    'nomorHp'=> $faker->phoneNumber,
                    'sidi' => 'Ya'
                ]);
            }
            if (!in_array($kkId, $kkWithMother)) {
                // insert data ke table Jemaat untuk ibu rumah tangga
                DB::table('jemaats')->insert([
                    'kk_id' => $kkId,
                    'nik' => $faker->unique()->nik(),
                    'nama' => $faker->name,
                    'tempatLahir' => $faker->city,
                    'tglLahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'jenisKelamin' => 'Wanita',
                    'golDarah' => 'A',
                    'pekerjaan' => $faker->jobTitle,
                    'statusKeluarga' => 'Ibu Rumah Tangga',
                    'nomorHp'=> $faker->phoneNumber,
                    'sidi' => 'Ya'
                ]);
                $kkWithMother[] = $kkId;
            }

             // Menambahkan anak secara acak
            $jumlahAnak = $faker->numberBetween(1, 5); // Ubah jumlah anak sesuai kebutuhan
            for ($j = 1; $j <= $jumlahAnak; $j++) {
                DB::table('jemaats')->insert([
                    'kk_id' => $kkId,
                    'nik' => $faker->unique()->numerify('################'),
                    'nama' => $faker->name,
                    'tempatLahir' => $faker->city,
                    'tglLahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'jenisKelamin' => (random_int(0, 1) === 0) ? 'Pria' : 'Wanita',
                    'golDarah' => 'A',
                    'pekerjaan' => $faker->jobTitle,
                    'statusKeluarga' => 'Anak',
                    'nomorHp'=> $faker->phoneNumber,
                    'sidi' => (random_int(0, 1) === 0) ? 'Ya' : 'Tidak',
                ]);
            }
        }
    }
}
