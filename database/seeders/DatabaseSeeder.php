<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\KeuanganSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PendetaSeeder::class);
        $this->call(WijkSeeder::class);
        $this->call(SintuaSeeder::class);
        $this->call(KkSeeder::class);
        $this->call(KeuanganSeeder::class);
    }
}
