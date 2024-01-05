<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendudukApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penduduk::orderBy('nik', 'asc')->get();
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
        $dataPenduduk = new Penduduk;

        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'lahir' => 'required|date',
            'agama_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataPenduduk->nik = $request->nik;
        $dataPenduduk->nama = $request->nama;
        $dataPenduduk->alamat = $request->alamat;
        $dataPenduduk->lahir = $request->lahir;
        $dataPenduduk->agama_id = $request->agama_id;

        $post = $dataPenduduk->save();

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
        $data = Penduduk::find($id);
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
        $dataPenduduk = Penduduk::find($id);
        if (empty($dataPenduduk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'lahir' => 'required|date',
            'agama_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan Update Data',
                'data' => $validator->errors()
            ]);
        }

        $dataPenduduk->nik = $request->nik;
        $dataPenduduk->nama = $request->nama;
        $dataPenduduk->alamat = $request->alamat;
        $dataPenduduk->lahir = $request->lahir;
        $dataPenduduk->agama_id = $request->agama_id;

        $post = $dataPenduduk->save();

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
        $dataPenduduk = Penduduk::find($id);
        if (empty($dataPenduduk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataPenduduk->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan Delete Data'
        ]);
    }
}
