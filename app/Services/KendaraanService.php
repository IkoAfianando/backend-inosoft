<?php
namespace App\Services;

use App\Repositories\KendaraanRepository;

class KendaraanService
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepository $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function lihatStok()
    {
        $kendaraan = $this->kendaraanRepository->getAll();

        return $kendaraan;
    }

    public function jualMobil($mobilId)
    {

        $mobil = $this->kendaraanRepository->find($mobilId);

        if (!$mobil) {
            throw new \Exception("Mobil tidak ditemukan");
        }

        if ($mobil->stock <= 0) {
            throw new \Exception("Stok mobil habis");
        }

        $this->kendaraanRepository->decrementStock($mobilId);


        return $mobil;
    }
}
