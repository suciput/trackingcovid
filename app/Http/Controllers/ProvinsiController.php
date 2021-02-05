<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_provinsi' => 'required|max:4|unique:provinsis',
            'nama_provinsi' => 'required|unique:provinsis',
        ], [

            'kode_provinsi.required' => 'kode provinsi tidak boleh kosong',
            'kode_provinsi.max' => 'kode maximal 4 karakter',
            'kode_provinsi.unique' => 'kode maximal 4 terdaftar',
            'nama_provinsi.required' => 'Nama provinsi tidak boleh kosong ',
            'nama_provinsi.unique' => 'nama provinsi sudah terdaftar',
        ]);
        //
        $provinsi = new provinsi;
        $provinsi->kode_provinsi  = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('provinsi.show',compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $provinsi = Provinsi::findOrfail($id);
        return view('provinsi.edit',compact('provinsi'));
    }

    
    public function update(Request $request,$id)
    {
        $provinsi = provinsi::findOrfail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $provinsi = provinsi::findOrfail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index');
    }
}
