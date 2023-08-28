<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendapatans')->insert([
            'kode' => 'P1',
            'nama' => 'Persembahan 1',
            'slug' => 'persembahan-1',
        ]);

        DB::table('pendapatans')->insert([
            'kode' => 'P2',
            'nama' => 'Persembahan 2',
            'slug' => 'persembahan-2',
        ]);

        DB::table('pendapatans')->insert([
            'kode' => 'P3',
            'nama' => 'Persembahan 3',
            'slug' => 'persembahan-3',
        ]);
        DB::table('pendapatans')->insert([
            'kode' => 'P4',
            'nama' => 'Persembahan 4',
            'slug' => 'persembahan-4',
        ]);

        DB::table('pengeluarans')->insert([
            'kode' => 'PM1',
            'nama' => 'Pembayaran 1',
            'slug' => 'pembayaran-1',
        ]);

        DB::table('pengeluarans')->insert([
            'kode' => 'PM2',
            'nama' => 'Pembayaran 2',
            'slug' => 'pembayaran-2',
        ]);

        DB::table('pengeluarans')->insert([
            'kode' => 'PM3',
            'nama' => 'Pembayaran 3',
            'slug' => 'pembayaran-3',
        ]);
        DB::table('pengeluarans')->insert([
            'kode' => 'PM4',
            'nama' => 'Pembayaran 4',
            'slug' => 'pembayaran-4',
        ]);

        $faker = \Faker\Factory::create('id_ID');
        $startDate = strtotime('January 1st');
        $endDate = time(); // Waktu saat ini

        for ($i = 1; $i <= 100; $i++) {
            $randomDate = date("Y-m-d H:i:s", mt_rand($startDate, $endDate));
            DB::table('deposits')->insert([
            'pendapatan_id' => rand(1, 4),
            'nominalPendapatan' => $faker->randomNumber(7), // Contoh: angka 6 digit
            'catatan' => $faker->sentence,
            'tglDeposit' => $randomDate,
            'user_id' => rand(1, 2)]);
        }

        for ($i = 1; $i <= 100; $i++) {
            $randomDate = date("Y-m-d H:i:s", mt_rand($startDate, $endDate));
            DB::table('pembayarans')->insert([
            'pengeluaran_id' => rand(1, 4),
            'nominalPengeluaran' => $faker->randomNumber(6), // Contoh: angka 6 digit
            'catatan' => $faker->sentence,
            'tglDeposit' => $randomDate,
            'user_id' => rand(1, 2)]);
        }
    }
}
