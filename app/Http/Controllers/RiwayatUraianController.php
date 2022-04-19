<?php

namespace App\Http\Controllers;

use App\Models\Riwayat_uraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatUraianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Riwayat_uraian::all();
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
        $ruraian = new Riwayat_uraian;
        $ruraian->uraian_id = $request->uraian_id;
        $ruraian->riwayat_diagnosa_id = $request->riwayat_diagnosa_id;
        $ruraian->penjelasan_uraian = $request->penjelasan_uraian;
        $ruraian->save();

        return response()->json([
            'uraian_id' => $ruraian->uraian_id,
            'riwayat_diagnosa_id' => $ruraian->riwayat_diagnosa_id,
            'penjelasan_uraian' => $ruraian->penjelasan_uraian,
            'result' => 'Create data successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat_uraian  $riwayat_uraian
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat_uraian $riwayat_uraian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat_uraian  $riwayat_uraian
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat_uraian $riwayat_uraian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Riwayat_uraian  $riwayat_uraian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riwayat_uraian $riwayat_uraian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat_uraian  $riwayat_uraian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riwayat_uraian $riwayat_uraian)
    {
        //
    }

    public function listRiwayatUraian($akun)
    {
        $riwayaturaian = DB::select("CALL selectDataRiwayatGejala(" . $akun . ")");

        // echo "<pre>";
        // print_r($riwayaturaian);
        return response()->json($riwayaturaian);
    }
}
