<?php

namespace App\Http\Controllers;

use App\Models\Riwayat_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data = Riwayat_data::where('user_id', $id)->get();
        // return response()->json(["message" => "success", "history" => $data]);
        return Riwayat_data::all();
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
        //
        $ruraian = new Riwayat_data;
        $ruraian->data_id = $request->data_id;
        $ruraian->riwayat_diagnosa_id = $request->riwayat_diagnosa_id;
        $ruraian->save();

        return response()->json([
            'data_id' => $ruraian->data_id,
            'riwayat_diagnosa_id' => $ruraian->riwayat_diagnosa_id,
            'result' => 'Create data successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat_data  $riwayat_data
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat_data $riwayat_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat_data  $riwayat_data
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat_data $riwayat_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riwayat_data  $riwayat_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riwayat_data $riwayat_data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat_data  $riwayat_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riwayat_data $riwayat_data)
    {
        //
    }

    public function listRiwayatGejala($akun)
    {
        $riwayatgejala = DB::select("CALL selectDataRiwayatGejala(" . $akun . ")");

        // echo "<pre>";
        // print_r($riwayatgejala);
        return response()->json($riwayatgejala);
    }
}
