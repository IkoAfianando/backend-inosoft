<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $kendaraanId = DB::table('kendaraans')->insertGetId([
            'tahunKeluaran' => 2019,
            'warna' => 'green',
            'harga' => 10000,
        ]);

        // Insert data into "motors" table
        DB::table('motors')->insert([
            'mesin' => 'v8',
            'tipeSuspensi' => 'sport',
            'tipeTransmisi' => 'manual',
            'kendaraanId' => $kendaraanId,
            'stock' => 10,
        ]);

        // Insert data into "mobils" table
        DB::table('mobils')->insert([
            'mesin' => 'v8',
            'kapasitasPenumpang' => 100,
            'tipe' => 'sedan',
            'kendaraanId' => $kendaraanId,
            'stock' => 10,
        ]);
    }
}
