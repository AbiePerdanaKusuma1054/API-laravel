<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        return response()->json(['message' => 'success', 'data' => $pasien]);
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mahasiswa_id' => 'required',
                'nama_pasien' => 'required|min:3',
                'umur' => 'required',
                'gender' => 'required',
                'nomor_hp' => 'required|min:10',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => false, 'message' => $error, 'data' => []], 422);
            } else {
                $pasien = new Pasien();
                $pasien->mahasiswa_id = $request->mahasiswa_id;
                $pasien->nama_pasien = $request->nama_pasien;
                $pasien->umur = $request->umur;
                $pasien->kondisi = "sakit";
                $pasien->gender = $request->gender;
                $pasien->nomor_hp = $request->nomor_hp;
                $pasien->save();
                return response()->json(['status' => true, 'message' => 'Pasien Created!', 'data' => $pasien], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }
    public function show($id)
    {
        $daftarpasien = Pasien::where('mahasiswa_id', $id)->get();
        return response()->json(['message' => 'success', 'data' => $daftarpasien]);
    }
}
