<?php

namespace App\Http\Controllers;

use App\Models\Anggotakk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotakkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Anggotakk::orderBy('kk_id', 'asc')->get();
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
        $dataAnggotakk = new Anggotakk;

        $rules = [
            'kk_id' => 'required',
            'penduduk_id' => 'required',
            'hubungankk_id' => 'required',
            'statusaktif' => 'required',
            'user_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataAnggotakk->kk_id = $request->kk_id;
        $dataAnggotakk->penduduk_id = $request->penduduk_id;
        $dataAnggotakk->hubungankk_id = $request->hubungankk_id;
        $dataAnggotakk->statusaktif = $request->statusaktif;
        $dataAnggotakk->user_id = $request->user_id;

        $port = $dataAnggotakk->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan Data Baru'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Anggotakk::find($id);
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
        $dataAnggotakk = Anggotakk::find($id);
        if (empty($dataAnggotakk)) {
            return response()->json([
                'status' => false,
                'mesaage' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'kk_id' => 'required',
            'penduduk_id' => 'required',
            'hubungankk_id' => 'required',
            'statusaktif' => 'required',
            'user_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan Update Data',
                'data' => $validator->errors()
            ]);
        }

        $dataAnggotakk->kk_id = $request->kk_id;
        $dataAnggotakk->penduduk_id = $request->penduduk_id;
        $dataAnggotakk->hubungankk_id = $request->hubungankk_id;
        $dataAnggotakk->statusaktif = $request->statusaktif;
        $dataAnggotakk->user_id = $request->user_id;

        $post = $dataAnggotakk->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melkaukan Update Data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataAnggotakk = Anggotakk::find($id);
        if (empty($dataAnggotakk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataAnggotakk->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan Delete Data'
        ]);
    }
}
