<?php
namespace App\Services;

use App\Repositories\MotorRepository;
use App\RepositoriesMotorRepository;

class MotorService
{
    protected $motorRepository;

    public function __construct(MotorRepository $motorRepository)
    {
        $this->motorRepository = $motorRepository;
    }


    public function jualMotor($mobilId)
    {

        $mobil = $this->motorRepository->find($mobilId);

        if (!$mobil) {
            throw new \Exception("Mobil tidak ditemukan");
        }

        if ($mobil->stock <= 0) {
            throw new \Exception("Stok mobil habis");
        }

        $this->motorRepository->decrementStock($mobilId);


        return $mobil;
    }
}
