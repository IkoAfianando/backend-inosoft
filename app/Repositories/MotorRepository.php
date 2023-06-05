<?php

namespace App\Repositories;

use App\Models\Motor;
use MongoDB\BSON\ObjectId;

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
}
