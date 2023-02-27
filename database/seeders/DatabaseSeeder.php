<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        DB::table('users')->insert([
            'name' => 'Vickyy',
            'email' => 'vicky@gmail.com',
            'password' => bcrypt('123'),
            'role' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Rekaa',
            'email' => 'reka@gmail.com',
            'password' => bcrypt('123'),
            'role' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('wijks')->insert([
            'nama' => 'Sei Panas',
            'slug' => 'sei-panas',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $wijkId = DB::table('wijks')->pluck('id');

        DB::table('kks')->insert([
            'nomorKk' => '3311911092',
            'alamat' => 'Bengkong Telaga Indah Blok F/19',
            'kecamatan' => 'Bengkong',
            'kelurahan' => 'Sadai',
            'wijk_id' => $wijkId,
            'statusRumah' => 'Rumah Sendiri',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $kkId = DB::table('kks')->pluck('id');

        DB::table('jemaats')->insert([
            'kk_id' => $kkId,
            'nik' => '3311911062',
            'nama' => 'Vicky Leonardo Manurung',
            'tglLahir' => '2001-08-27',
            'jenisKelamin' => 'Pria',
            'golDarah' => 'A',
            'pekerjaan' => 'Programmer',
            'statusKeluarga' => 'Kepala Keluarga',
            'nomorHp' => '081275528661',
            'foto' => 'fotoJemaat/44590aa922914066f965ae67be0222d2.jpg',
            'sidi' => 'Ya',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('jemaats')->insert([
            'kk_id' => $kkId,
            'nik' => '3311911010',
            'nama' => 'Reka Pebrianti Simanjuntak',
            'tglLahir' => '2000-02-11',
            'jenisKelamin' => 'Wanita',
            'golDarah' => 'A',
            'pekerjaan' => 'Programmer',
            'statusKeluarga' => 'Ibu Rumah Tangga',
            'nomorHp' => '081275528661',
            'foto' => 'fotoJemaat/f81398ac7249eab440df0219892f3dd5.jpg',
            'sidi' => 'Ya',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


    }
}
