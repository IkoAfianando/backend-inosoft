<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Mobil;
use MongoDB\BSON\ObjectId;

class MobilRepository
{

    public function find($id)
    {
        return Mobil::find($id);
    }

    public function decrementStock($id)
    {
        return Mobil::where('_id', $id)->decrement('stock');
    }

    public function cekHarga($id)
    {
        $kendaraanId = Mobil::where('_id', $id)->first()->kendaraanId;
        $harga = Kendaraan::where('_id', $kendaraanId)->first()->harga;

        return $harga;
    }
}
