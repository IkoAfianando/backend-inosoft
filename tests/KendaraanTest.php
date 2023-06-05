<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    use RefreshDatabase;

    public function testLihatStokKendaraan()
    {
        Kendaraan::factory()->create([
            'tipe' => 'motor',
            'tahunKeluaran' => 2020,
            'warna' => 'merah',
            'harga' => 15000000,
        ]);

        Kendaraan::factory()->create([
            'tipe' => 'mobil',
            'tahunKeluaran' => 2019,
            'warna' => 'hitam',
            'harga' => 200000000,
        ]);

        $response = $this->get('/api/kendaraan');

        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJson([
                [
                    'tipe' => 'motor',
                    'tahunKeluaran' => 2020,
                    'warna' => 'merah',
                    'harga' => 15000000,
                ],
                [
                    'tipe' => 'mobil',
                    'tahunKeluaran' => 2019,
                    'warna' => 'hitam',
                    'harga' => 200000000,
                ],
            ]);
    }

    public function testPenjualanKendaraan()
    {
        $data = [
            'tipe' => 'motor',
            'tahunKeluaran' => 2022,
            'warna' => 'biru',
            'harga' => 12000000,
            'mesin' => '150cc',
            'tipeSuspensi' => 'double wishbone',
            'tipeTransmisi' => 'manual',
        ];

        $response = $this->post('/api/kendaraan', $data);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Kendaraan berhasil ditambahkan',
            ]);

        $this->assertDatabaseHas('kendaraan', [
            'tipe' => 'motor',
            'tahunKeluaran' => 2022,
            'warna' => 'biru',
            'harga' => 12000000,
        ]);

        $this->assertDatabaseHas('motor', [
            'mesin' => '150cc',
            'tipeSuspensi' => 'double wishbone',
            'tipeTransmisi' => 'manual',
        ]);
    }

    public function testLaporanPenjualan()
    {
        Kendaraan::factory()->create([
            'tipe' => 'motor',
            'tahunKeluaran' => 2020,
            'warna' => 'merah',
            'harga' => 15000000,
        ]);

        Kendaraan::factory()->create([
            'tipe' => 'mobil',
            'tahunKeluaran' => 2019,
            'warna' => 'hitam',
            'harga' => 200000000,
        ]);

        $response = $this->post('/api/kendaraan/laporan', ['tipe' => 'motor']);

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJson([
                [
                    'tipe' => 'motor',
                    'tahunKeluaran' => 2020,
                    'warna' => 'merah',
                    'harga' => 15000000,
                ],
            ]);
    }
}
