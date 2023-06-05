<?php

namespace App\Repositories;

use App\Models\Sale;

class SaleRepository
{
    public function create($data)
    {
        return Sale::create($data);
    }

    public function getAll()
    {
        return Sale::all();
    }
}
