<?php

namespace App\Http\Controllers;

use App\Models\Akun;
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
        return Akun::all();
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
                'nomor_induk' => 'required|min:8|unique:akuns',
                'nama' => 'required|min:3|unique:akuns',
                'email' => 'required|email|unique:akuns',
                'phone_number' => 'required|unique:akuns',
                'role_id' => 'required',
                'password' => 'required|min:8',
                'jurusan' => 'required|min:2'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => false, 'message' => $error, 'data' => []], 422);
            } else {
                $akun = new Akun;
                $akun->nomor_induk = $request->nomor_induk;
                $akun->nama = $request->nama;
                $akun->email = $request->email;
                $akun->phone_number = $request->phone_number;
                $akun->role_id = $request->role_id;
                $akun->password = Hash::make($request->password, ['rounds' => 12]);
                $akun->jurusan = $request->jurusan;
                $akun->image = "images/default.png";
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
        $row = Akun::firstWhere('nomor_induk', $request->nomor_induk);
        if (!$row) {
            $data = [
                'status' => false,
                'message' => 'Nomor induk belum terdaftar!',
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
                $data = [
                    'status' => true,
                    'message' => 'Login Berhasil!',
                    'data' => [
                        "id" => $row->id,
                        "nomor_induk" => $row->nomor_induk,
                        "nama" => $row->nama,
                        "email" => $row->email,
                        "phone_number" => $row->phone_number,
                        "role_id" => $row->role_id,
                        "image" => $row->image,
                        "jurusan" => $row->jurusan
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
