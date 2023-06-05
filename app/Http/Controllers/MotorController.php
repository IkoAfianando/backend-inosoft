<?php


namespace App\Http\Controllers;


use App\Services\MotorService;
use Illuminate\Http\Request;

class MotorController extends Controller
{

    public function __construct(MotorService $motorService) {
        $this->motorService = $motorService;
    }

    public function penjualan(Request $request)
    {
        try {
            $kendaraan = $this->motorService->jualMotor($request->mobilId);

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
