<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    //
    public function index()
    {
        $riwayat = Riwayat::all();
        return response()->json(['message' => 'success', 'data' => $riwayat]);
    }
    
    public function store(Request $request)
    {
        $riwayat = new Riwayat;
        $riwayat->user_id = $request->user_id;
        $riwayat->intervensi_id = $request->intervensi_id;
        $riwayat->pasien_id = $request->pasien_id;
        $riwayat->save();

        return response()->json([
            'data' => $riwayat,
            'result' => 'Create data successfully!'
        ]);
    }

    public function show($id)
    {
        $riwayat = Riwayat::where('user_id', $id)->get();
        return response()->json(['message' => 'success', 'data' => $riwayat]);
    }
    
}