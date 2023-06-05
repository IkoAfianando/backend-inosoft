<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Motor;


class MotorRepository
{

    public function find($id)
    {
        return Motor::find($id);
    }

    public function decrementStock($id)
    {
        return Motor::where('_id', $id)->decrement('stock');
    }

    public function cekHarga($id)
    {
        $kendaraanId = Motor::where('_id', $id)->first()->kendaraanId;
        $harga = Kendaraan::where('_id', $kendaraanId)->first()->harga;

        return $harga;
    }
}
