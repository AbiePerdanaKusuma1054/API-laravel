<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:akuns',
                'role_id' => 'required',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => false, 'message' => $error, 'data' => []], 422);
            } else {
                $akun = new Akun;
                $akun->email = $request->email;
                $akun->role_id = $request->role_id;
                $akun->password = Hash::make($request->password, ['rounds' => 12]);
                $akun->save();
                return response()->json(['status' => true, 'message' => 'Profile Created!', 'data' => $akun], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $row = Akun::firstWhere('email', $request->email);
        if (!$row) {
            $data = [
                'status' => false,
                'message' => 'Email belum terdaftar!',
            ];
            return response()->json($data, 401);
        } else {
            if (!Hash::check($request->password, $row->password)) {
                $data = [
                    'status' => false,
                    'message' => 'Password salah!',
                ];
                return response()->json($data, 401);
            } else {
                $mahasiswa = Mahasiswa::firstWhere('akun_id', $row->id);
                $dosen = Dosen::firstWhere('akun_id', $row->id);
                if ($mahasiswa == null) {
                    $akun = $dosen;
                } else {
                    $akun = $mahasiswa;
                }
                $data = [
                    'status' => true,
                    'message' => 'Login Berhasil!',
                    'data' => [
                        "id" => $row->id,
                        "email" => $row->email,
                        "role_id" => $row->role,
                        "biodata" => $akun,
                    ],
                ];
                return response()->json($data, 200);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(Akun $akun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nomor_induk = $request->nomor_induk;
        $nama = $request->nama;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $password = $request->password;
        $jurusan = $request->jurusan;
        $image = $request->image;

        $akun = Akun::find($id);
        $akun->nomor_induk = $nomor_induk;
        $akun->nama = $nama;
        $akun->email = $email;
        $akun->phone_number = $phone_number;
        $akun->password = $password;
        $akun->jurusan = $jurusan;
        $akun->image = $image;
        $akun->save();

        return response()->json([
            'nomor_induk' => $akun->nomor_induk,
            'nama' => $akun->nama,
            'email' => $akun->email,
            'phone_number' => $akun->phone_number,
            'password' => $akun->password,
            'jurusan' => $akun->jurusan,
            'image' => $akun->image,
            'result' => 'data successfully updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $akun = Akun::find($id);
        $akun->delete();

        return 'data successfully deleted!';
    }
}
