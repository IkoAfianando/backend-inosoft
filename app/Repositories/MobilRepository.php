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
}
