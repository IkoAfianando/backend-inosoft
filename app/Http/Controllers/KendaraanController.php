<?php


namespace App\Http\Controllers;


use App\Services\KendaraanService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{

    public function __construct(KendaraanService $kendaraanService) {
        $this->kendaraanService = $kendaraanService;
    }
    public function lihatStok()
    {
        $kendaraan = $this->kendaraanService->lihatStok();

        return response()->json($kendaraan);
    }

    public function penjualan(Request $request)
    {
        try {
            $kendaraan = $this->kendaraanService->jualMobil($request->mobilId);

            return response()->json($kendaraan);

        }catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function laporanPenjualan(Request $request)
    {

    }
}
