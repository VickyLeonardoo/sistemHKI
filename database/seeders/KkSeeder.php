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
        $faker = \Faker\Factory::create('id_ID');
        $kkWithHead = [];
        $kkWithMother = [];

        // Loop through each wijk_id (1 to 5)
        for ($wijkId = 1; $wijkId <= 5; $wijkId++) {
            $kkPerWijk = 0;

            while ($kkPerWijk < 10) { // Generate exactly 10 records for each wijk_id
                // Insert data into the kks table using Faker
                $kkId = DB::table('kks')->insertGetId([
                    'nomorKk' => $faker->unique()->nik(),
                    'alamat' => $faker->address,
                    'kecamatan' => $faker->city,
                    'kelurahan' => $faker->city,
                    'wijk_id' => $wijkId,
                    'statusRumah' => 'Rumah Sendiri'
                ]);

                $kkPerWijk++;

                if (!in_array($kkId, $kkWithHead)) {
                    DB::table('jemaats')->insert([
                        'kk_id' => $kkId,
                        'nik' => $faker->unique()->nik(),
                        'nama' => $faker->name,
                        'tempatLahir' => $faker->city,
                        'tglLahir' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
                        'jenisKelamin' => 'Laki-Laki',
                        'pekerjaan' => $faker->jobTitle,
                        'statusKeluarga' => 'Kepala Keluarga',
                        'nomorHp' => $faker->phoneNumber,
                        'sidi' => 'Ya'
                    ]);
                }

                if (!in_array($kkId, $kkWithMother)) {
                    DB::table('jemaats')->insert([
                        'kk_id' => $kkId,
                        'nik' => $faker->unique()->nik(),
                        'nama' => $faker->name,
                        'tempatLahir' => $faker->city,
                        'tglLahir' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
                        'jenisKelamin' => 'Perempuan',
                        'pekerjaan' => $faker->jobTitle,
                        'statusKeluarga' => 'Ibu Rumah Tangga',
                        'nomorHp' => $faker->phoneNumber,
                        'sidi' => 'Ya'
                    ]);
                    $kkWithMother[] = $kkId;
                }

                // Add random children
                $jumlahAnak = $faker->numberBetween(1, 5); // Modify as needed
                for ($j = 1; $j <= $jumlahAnak; $j++) {
                    DB::table('jemaats')->insert([
                        'kk_id' => $kkId,
                        'nik' => $faker->unique()->numerify('################'),
                        'nama' => $faker->name,
                        'tempatLahir' => $faker->city,
                        'tglLahir' => $faker->date($format = 'Y-m-d', $min = '2001-01-01', $max = '2003-12-31'),
                        'jenisKelamin' => (random_int(0, 1) === 0) ? 'Laki-Laki' : 'Perempuan',
                        'pekerjaan' => $faker->jobTitle,
                        'statusKeluarga' => 'Anak',
                        'nomorHp' => $faker->phoneNumber,
                        'sidi' => (random_int(0, 1) === 0) ? 'Ya' : 'Tidak',
                    ]);
                }
            }
        }
    }
}
