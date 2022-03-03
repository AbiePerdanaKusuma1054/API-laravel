<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Data::all();
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
        $data = new Data;
        $data->nama = $request->nama;
        $data->skor = $request->skor;
        $data->tipe_id = $request->tipe_id;
        $data->save();

        return response()->json([
            'nama' => $data->nama,
            'skor' => $data->skor,
            'tipe_id' => $data->tipe_id,
            'result' => 'Create data successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama = $request->nama;
        $skor = $request->skor;
        $tipe_id = $request->tipe_id;

        $data = Data::find($id);
        $data->nama = $nama;
        $data->skor = $skor;
        $data->tipe_id = $tipe_id;
        $data->save();

        return response()->json([
            'nama' => $data->nama,
            'skor' => $data->skor,
            'tipe_id' => $data->tipe_id,
            'result' => 'Data successfully updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Data::find($id);
        $data->delete();
    }

    //-------------------------------------
    public function datalist($id)
    {
        $datalist = DB::table('data')
            ->select('id', 'nama', 'skor', 'tipe_id', 'diagnosa_id', 'created_at', 'updated_at')
            ->where('tipe_id', $id)
            ->get();

        // echo "<pre>";
        // print_r($datalist);
        return response()->json(
            $datalist
        );
    }
}
