<?php

namespace App\Http\Controllers;

use App\Models\Hubungankk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HubungankkApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Hubungankk::orderBY('id', 'asc')->get();
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
        $dataHubungankk = new Hubungankk;

        $rules = [
            'hubungankk' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataHubungankk->hubungankk = $request->hubungankk;

        $post = $dataHubungankk->save();

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
        $data = Hubungankk::find($id);
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
        $dataHubungankk = Hubungankk::find($id);
        if (empty($dataHubungankk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'hubungankk' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan Update Data',
                'data' => $validator->errors()
            ]);
        }

        $dataHubungankk->hubungankk = $request->hubungankk;

        $post = $dataHubungankk->save();

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
        $dataHubungankk = Hubungankk::find($id);
        if (empty($dataHubungankk)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataHubungankk->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan Delete Data'
        ]);
    }
}
