<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json(['message' => 'success', 'data' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'akun_id' => 'required|unique:mahasiswas',
                'nomor_induk' => 'required|min:8|unique:mahasiswas',
                'nama' => 'required|min:3|unique:mahasiswas',
                'phone_number' => 'required|unique:mahasiswas',
                'jurusan' => 'required|min:2'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => false, 'message' => $error, 'data' => []], 422);
            } else {
                $mahasiswa = new Mahasiswa();
                $mahasiswa->akun_id = $request->akun_id;
                $mahasiswa->nomor_induk = $request->nomor_induk;
                $mahasiswa->nama = $request->nama;
                $mahasiswa->phone_number = $request->phone_number;
                $mahasiswa->jurusan = $request->jurusan;
                $mahasiswa->image = "images/default.png";
                $mahasiswa->save();
                return response()->json(['status' => true, 'message' => 'Profile Created!', 'data' => $mahasiswa], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
