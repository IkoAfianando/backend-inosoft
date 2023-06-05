<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    protected  $collection = 'sales';
    protected $fillable = [
        'mobilId',
        'motorId',
        'harga',
        'mesin',
        'nama',
        'stock'
    ];
}
