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
            'nama' => 'honda a',
            'mesin' => 'v8',
            'tipeSuspensi' => 'sport',
            'tipeTransmisi' => 'manual',
            'kendaraanId' => $kendaraanId,
            'stock' => 10,
        ]);

        DB::table('motors')->insert([
            'nama' => 'honda b',
            'mesin' => 'v7',
            'tipeSuspensi' => 'sport',
            'tipeTransmisi' => 'matic',
            'kendaraanId' => $kendaraanId,
            'stock' => 5,
        ]);

        // Insert data into "mobils" table
        DB::table('mobils')->insert([
            'nama' => 'toyota a',
            'mesin' => 'v8',
            'kapasitasPenumpang' => 100,
            'tipe' => 'sedan',
            'kendaraanId' => $kendaraanId,
            'stock' => 10,
        ]);

        DB::table('mobils')->insert([
            'nama' => 'toyota b',
            'mesin' => 'v1',
            'kapasitasPenumpang' => 10,
            'tipe' => 'pikep',
            'kendaraanId' => $kendaraanId,
            'stock' => 8,
        ]);
    }
}
