<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\provinsi;
use App\Http\Contollers\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = kota::with('provinsi')->get();
        return view('kota.index',compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('kota.create',compact('provinsi'));
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
            'kode_kota' => 'required|max:4|unique:kotas',
            'nama_kota' => 'required|unique:kotas',
        ], [

            'kode_kota.required' => 'kode kota tidak boleh kosong',
            'kode_kota.max' => 'kode maximal 4 karakter',
            'kode_kota.unique' => 'kode maximal 4 terdaftar',
            'nama_kota.required' => 'Nama kota tidak boleh kosong ',
            'nama_kota.unique' => 'nama kota sudah terdaftar',
        ]);

        $kota = new Kota();
        $kota->id_provinsi= $request->id_provinsi;
        $kota->kode_kota= $request->kode_kota;
        $kota->nama_kota= $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('kota.show',compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('kota.edit',compact('kota','provinsi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $kota = Kota::findOrFail($id);
       $kota->id_provinsi = $request->id_provinsi;
       $kota->kode_kota = $request->kode_kota;
       $kota->nama_kota = $request->nama_kota;
       $kota->save();
        return redirect()->route('kota.index');
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kota = Kota::findOrfail($id);
        $kota->delete();
        return redirect()->route('kota.index');
    }
}
