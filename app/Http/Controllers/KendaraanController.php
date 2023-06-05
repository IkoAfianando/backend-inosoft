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

        $data = [
            'status' => 'success',
            'data'=> $kendaraan
        ];

        return response()->json($data);
    }

}
