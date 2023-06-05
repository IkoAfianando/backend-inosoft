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
            // request parameter
            $mobil = $this->mobilService->jualMobil($request->id);

            $data = [
                'status' => 'success',
                'data'=> $mobil
            ];

            return response()->json($data);

        }catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
