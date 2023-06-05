<?php


namespace App\Http\Controllers;


use App\Services\MobilService;
use Illuminate\Http\Request;

class MobilController extends Controller
{

    public function __construct(MobilService $mobilService) {
        $this->mobilService = $mobilService;
    }

    public function penjualan(Request $request)
    {
        try {
            $kendaraan = $this->mobilService->jualMobil($request->mobilId);

            return response()->json($kendaraan);

        }catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
