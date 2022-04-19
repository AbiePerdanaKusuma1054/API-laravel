<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Http\Requests\UpdateMonitoringRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitoring = Monitoring::all();
        return response()->json(['message' => 'success', 'data' => $monitoring]);
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
     * @param  \App\Http\Requests\StoreMonitoringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'mahasiswa_id' => 'required',
                'dosen_id' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => false, 'message' => $error, 'data' => []], 422);
            } else {
                $monitoring = new Monitoring();
                $monitoring->mahasiswa_id = $request->mahasiswa_id;
                $monitoring->dosen_id = $request->dosen_id;
                $monitoring->save();
                return response()->json(['status' => true, 'message' => 'Profile Created!', 'data' => $monitoring], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage(), 'data' => []], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftarmahasiswa = Monitoring::where('dosen_id', $id)->get();
        return response()->json(['message' => 'success', 'data' => $daftarmahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonitoringRequest  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonitoringRequest $request, Monitoring $monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoring)
    {
        //
    }
}
