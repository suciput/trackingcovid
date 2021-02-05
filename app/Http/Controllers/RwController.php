<?php

namespace App\Http\Controllers;
use App\Models\kelurahan;
use App\Models\rw;
use Illuminate\Http\Request;

class RwController extends Controller
{

    public function index()
    {
        $rw = RW::with('kelurahan')->get();
        return view('rw.index', compact('rw'));
    }

    
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('rw.create', compact('kelurahan'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'nama_rw' => 'required|unique:rws',
        ], [

            'nama_rw.required' => 'Nama rw tidak boleh kosong ',
            'nama_rw.unique' => 'nama rw sudah terdaftar',
        ]);

        $rw = new Rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama_rw= $request->nama_rw;
        $rw->save();
          return redirect()->route('rw.index');
    }

   
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('rw.show',compact('rw'));
    }

    
    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('rw.edit',compact('rw','kelurahan'));
    }

   
    public function update(Request $request,$id)
    {
        $rw = Rw::findOrFail($id);
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->nama_rw= $request->nama_rw;
        $rw->save();
          return redirect()->route('rw.index');
    }

   
    public function destroy($id)
    {
        $rw= Rw::findOrfail($id);
        $rw->delete();
           return redirect()->route('rw.index');
    }
}
