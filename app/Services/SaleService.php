<?php
namespace App\Services;

use App\Repositories\MotorRepository;
use App\Repositories\SaleRepository;


class SaleService
{
    protected $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }


    public function getAll()
    {
        return $this->saleRepository->getAll();
    }
}
