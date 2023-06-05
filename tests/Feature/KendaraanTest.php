<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
//    use RefreshDatabase;

    public function testLihatStokKendaraan()
    {
        /*
        Before initialization insert with db:seed
        */

        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iLCJpYXQiOjE2ODU5MzE0OTYsImV4cCI6NTI4NTkzMTQ5NiwibmJmIjoxNjg1OTMxNDk2LCJqdGkiOiJmczJzWDNKZmdyc0tUYWtCIiwic3ViIjoiNjQ3ZDQzNjRjYjAxOTZhNDgzMDY1NzcyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.VuyC6gSQBArEXVQS3YnsZba8JKvbnYAMjlPw2JRfA60',
        ])->get('http://localhost:8000/api/stock/kendaraan');

        $response->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "data" => [
                    [
                        "_id" => "647d43595187dd43490e09d2",
                        "tahunKeluaran" => 2019,
                        "warna" => "green",
                        "harga" => 10000,
                        "mobils" => [
                            [
                                "nama" => "toyota a",
                                "mesin" => "v8",
                                "kapasitasPenumpang" => 100,
                                "tipe" => "sedan",
                                "stock" => 10,
                                "id" => "647d43595187dd43490e09d5"
                            ],
                            [
                                "nama" => "toyota b",
                                "mesin" => "v1",
                                "kapasitasPenumpang" => 10,
                                "tipe" => "pikep",
                                "stock" => 8,
                            ]
                        ],
                        "motors" => [
                            [
                                "nama" => "honda a",
                                "mesin" => "v8",
                                "tipeSuspensi" => "sport",
                                "tipeTransmisi" => "manual",
                                "stock" => 10,
                            ],
                            [
                                "nama" => "honda b",
                                "mesin" => "v7",
                                "tipeSuspensi" => "sport",
                                "tipeTransmisi" => "matic",
                                "stock" => 5,
                            ]
                        ]
                    ]
                ]
            ]);

    }

    public function testLaporanPenjualan()
    {
        /*
         * Before initialization test laporan with postman collection
         */
        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iLCJpYXQiOjE2ODU5MzE0OTYsImV4cCI6NTI4NTkzMTQ5NiwibmJmIjoxNjg1OTMxNDk2LCJqdGkiOiJmczJzWDNKZmdyc0tUYWtCIiwic3ViIjoiNjQ3ZDQzNjRjYjAxOTZhNDgzMDY1NzcyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.VuyC6gSQBArEXVQS3YnsZba8JKvbnYAMjlPw2JRfA60',
        ])->get('http://localhost:8000/api/stock/kendaraan');

        $response->assertStatus(200);
    }
}
