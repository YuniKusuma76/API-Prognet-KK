<?php

namespace App\Http\Controllers;

use App\Models\Kk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kk::orderby('nokk', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataKk = new Kk;

        $rules = [
            'nokk' => 'required',
            'statusaktif' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataKk->nokk = $request->nokk;
        $dataKk->statusaktif = $request->statusaktif;

        $post = $dataKk->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan Data baru'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kk::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataKk = Kk::find($id);
        if (empty($dataKk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nokk' => 'required',
            'statusaktif' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan Update Data',
                'data' => $validator->errors()
            ]);
        }

        $dataKk->nokk = $request->nokk;
        $dataKk->statusaktif = $request->statusaktif;

        $post = $dataKk->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan Update Data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataKk = Kk::find($id);
        if (empty($dataKk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $post = $dataKk->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan Delete Data'
        ]);
    }
}
