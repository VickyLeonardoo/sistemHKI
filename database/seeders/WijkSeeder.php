<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WijkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wijk = [
            [
                'nama' => 'Bengkong',
                'slug' => 'bengkong'
            ],
            [
                'nama' => 'Sei Panas',
                'slug' => 'sei-panas'
            ],
            [
                'nama' => 'Mangsang',
                'slug' => 'mangsang'
            ]
        ];
        DB::table('wijks')->insert($wijk);

    }
}
