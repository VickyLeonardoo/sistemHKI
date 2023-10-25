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
                'nama' => 'Wijk I',
                'slug' => 'wijk-i'
            ],
            [
                'nama' => 'Wijk II',
                'slug' => 'wijk-ii'
            ],
            [
                'nama' => 'Wijk III',
                'slug' => 'wijk-iii'
            ],
            [
                'nama' => 'Wijk IV',
                'slug' => 'wijk-iv'
            ],
            [
                'nama' => 'Wijk V',
                'slug' => 'wijk-v'
            ]
        ];
        DB::table('wijks')->insert($wijk);

    }
}
