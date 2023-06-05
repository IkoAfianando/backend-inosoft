<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use MongoDB\BSON\ObjectId;

class KendaraanRepository
{
    public function getAll()
    {
        $kendaraans = Kendaraan::raw(function ($collection) {
            return $collection->aggregate([
                [
                    '$match' => [
                        '_id' => new ObjectId(Kendaraan::first()->id),
                    ],
                ],
                [
                    '$lookup' => [
                        'from' => 'mobils',
                        'localField' => '_id',
                        'foreignField' => 'kendaraanId',
                        'as' => 'mobils',
                    ],
                ],
                [
                    '$lookup' => [
                        'from' => 'motors',
                        'localField' => '_id',
                        'foreignField' => 'kendaraanId',
                        'as' => 'motors',
                    ],
                ],
            ]);
        });

        $kendaraans = $kendaraans->map(function ($kendaraan) {
            $kendaraan->mobils = collect($kendaraan->mobils)->map(function ($mobil) {
                $mobil->id =(string) $mobil->_id;
                unset($mobil->_id, $mobil->kendaraanId);
                return $mobil;
            })->toArray();
            $kendaraan->motors = collect($kendaraan->motors)->map(function ($motor) {
                $motor->id =(string) $motor->_id;
                unset($motor->_id, $motor->kendaraanId);
                return $motor;
            })->toArray();
            return $kendaraan;
        });

        return $kendaraans;
    }
}
