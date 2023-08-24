<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SintuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sintua = [
            [
                'nama' => 'Robertson Malau',
                'slug' => 'robertson-malau',
                'wijk_id' => '1',
                'tglMulai' => Carbon::now(),
            ],
            [
                'nama' => 'Pantor Sibagariang',
                'slug' => 'pantor-sibagariang',
                'wijk_id' => '2',
                'tglMulai' => Carbon::now(),
            ],
            [
                'nama' => 'Rinto Mandailing',
                'slug' => 'rinto-mandailing',
                'wijk_id' => '3',
                'tglMulai' => Carbon::now(),
            ]
        ];
        DB::table('sintuas')->insert($sintua);

    }
}
