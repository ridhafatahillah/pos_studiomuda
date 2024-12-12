<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\datapelanggan;
use Illuminate\Http\Request;

class booking extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = datapelanggan::all();
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new \App\Models\datapelanggan();
        $data->id_booking = $request->id;
        $data->FNAME = $request->FNAME;
        $data->ORG = $request->ORG;
        $data->Q4 = $request->Q4;
        $data->TLP = $request->TLP;
        $data->startsAt = $request->startsAt;
        $data->save();

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $data = datapelanggan::find($request->id);
        $data->startsAt = $request->startsAt;
        $data->save();

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = datapelanggan::find($request->id);
        $data->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus',
            'data' => $data
        ], 200);
    }
}
