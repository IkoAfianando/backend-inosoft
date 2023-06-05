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
            $motor = $this->motorService->jualMotor($request->id);

            $data = [
                'status' => 'success',
                'data'=> $motor
            ];

            return response()->json($data);

        }catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

}
