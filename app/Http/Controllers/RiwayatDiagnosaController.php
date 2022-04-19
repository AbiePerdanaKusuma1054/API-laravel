<?php

namespace App\Http\Controllers;

use App\Models\RiwayatDiagnosa;
use App\Http\Requests\StoreRiwayatDiagnosaRequest;
use App\Http\Requests\UpdateRiwayatDiagnosaRequest;
use Illuminate\Http\Request;

class RiwayatDiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = RiwayatDiagnosa::all();
        return response()->json(['message' => 'success', 'data' => $riwayat]);
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
     * @param  \App\Http\Requests\StoreRiwayatDiagnosaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $riwayat = new RiwayatDiagnosa();
        $riwayat->intervensi_id = $request->intervensi_id;
        $riwayat->pasien_id = $request->pasien_id;
        $riwayat->save();

        return response()->json([
            'data' => $riwayat,
            'result' => 'Create data successfully!'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatDiagnosa  $riwayatDiagnosa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = RiwayatDiagnosa::where('pasien_id', $id)->get();
        return response()->json(['message' => 'success', 'data' => $riwayat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatDiagnosa  $riwayatDiagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatDiagnosa $riwayatDiagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRiwayatDiagnosaRequest  $request
     * @param  \App\Models\RiwayatDiagnosa  $riwayatDiagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRiwayatDiagnosaRequest $request, RiwayatDiagnosa $riwayatDiagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatDiagnosa  $riwayatDiagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatDiagnosa $riwayatDiagnosa)
    {
        //
    }
}
