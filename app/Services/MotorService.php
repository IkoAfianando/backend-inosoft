<?php
namespace App\Services;

use App\Repositories\MotorRepository;
use App\Repositories\SaleRepository;


class MotorService
{
    protected $motorRepository;
    protected $saleRepository;

    public function __construct(MotorRepository $motorRepository, SaleRepository $saleRepository)
    {
        $this->motorRepository = $motorRepository;
        $this->saleRepository = $saleRepository;
    }


    public function jualMotor($motorId)
    {

        $motor = $this->motorRepository->find($motorId);

        if (!$motor) {
            throw new \Exception("Motor tidak ditemukan");
        }

        if ($motor->stock <= 0) {
            throw new \Exception("Stok motor habis");
        }

        $this->motorRepository->decrementStock($motorId);

        $this->saleRepository->create([
            'motorId' => $motorId,
            'harga' => $this->motorRepository->cekHarga($motorId),
            'nama' => $this->motorRepository->find($motorId)->nama,
            'mesin' => $this->motorRepository->find($motorId)->mesin,
        ]);

        return $this->motorRepository->find($motorId);
    }
}
