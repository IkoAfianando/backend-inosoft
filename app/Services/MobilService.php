<?php
namespace App\Services;

use App\Repositories\MobilRepository;
use App\Repositories\SaleRepository;

class MobilService
{
    protected $mobilRepository;
    protected $saleRepository;

    public function __construct(MobilRepository $mobilRepository, SaleRepository $saleRepository)
    {
        $this->mobilRepository = $mobilRepository;
        $this->saleRepository = $saleRepository;
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

        $this->saleRepository->create([
            'mobilId' => $mobilId,
            'harga' => $this->mobilRepository->cekHarga($mobilId),
            'nama' => $this->mobilRepository->find($mobilId)->nama,
            'mesin' => $this->mobilRepository->find($mobilId)->mesin,
        ]);

        return $this->mobilRepository->find($mobilId);
    }


}
