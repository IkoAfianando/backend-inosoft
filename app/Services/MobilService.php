<?php
namespace App\Services;

use App\Repositories\MobilRepository;

class MobilService
{
    protected $mobilRepository;

    public function __construct(MobilRepository $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }


    public function jualMobil($mobilId)
    {

        $mobil = $this->mobilRepository->find($mobilId);

        if (!$mobil) {
            throw new \Exception("Mobil tidak ditemukan");
        }

        if ($mobil->stock <= 0) {
            throw new \Exception("Stok mobil habis");
        }

        $this->mobilRepository->decrementStock($mobilId);


        return $mobil;
    }
}
