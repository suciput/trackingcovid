<?php

namespace App\Http\Controllers\Api;
use App\Models\provinsi;
use App\Models\kasus2;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
  
    public function index()
        {
            $provinsi = provinsi::latest()->get();
            $res = [
                'success' => true,
                'data'   => $provinsi,
                'message' => 'Data Berhasil ditampilkan'
            ];
            return response()->json($res,200);
        }
    
   
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $provinsi = new provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();

        $res = [
            'success'=> true,
            'data' => $provinsi,
            'message' => 'data berhasil di simpan'
        ];

        return response()->json($res,200);
    }

    
    public function show($id)
    {   
       

    }


    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
