<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kelurahan = kelurahan::with('kecamatan')->get();
        return view('kelurahan.index',compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.create',compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_kelurahan' => 'required|unique:kelurahans',
        ], [
            'nama_kelurahan.required' => 'Nama kelurahan tidak boleh kosong ',
            'nama_kelurahan.unique' => 'nama kelurahan sudah terdaftar',
        ]);

        $kelurahan = new kelurahan();
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    public function show($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        return view('kelurahan.show',compact('kelurahan'));
    }

    public function edit($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit',compact('kelurahan','kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index');
    }

    public function destroy($id)
    {
        $kelurahan = kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index');
    }
}