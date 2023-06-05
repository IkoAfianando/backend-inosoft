<?php


namespace App\Http\Controllers;


use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function __construct(SaleService $saleService) {
        $this->saleService = $saleService;
    }

    public function laporanPenjualan(Request $request)
    {
        $sale = $this->saleService->getAll();
        $data = [
            'status' => 'success',
            'data'=> $sale
        ];

        return response()->json($data);
    }
}
