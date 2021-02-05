<?php

namespace App\Http\Controllers;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rw;
use App\Models\kasus2;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class Kasus2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kasus2 = Kasus2::with('rw')->get();
        return view('kasus2.index', compact('kasus2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
           $rw = Rw::all();
            return view ('kasus2.create', compact('rw'));
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
            'jumlah_positif' => 'required:kasus2s',
            'jumlah_sembuh' => 'required:kasus2s',
            'jumlah_meninggal' => 'required:kasus2s',
            'tanggal_update' => 'required:kasus2s'
        ], [
            'jumlah_positif.required'   => 'Data Positif tidak boleh kosong',
            'jumlah_sembuh.required'    => 'Data Sembuh tidak boleh kosong',
            'jumlah_meninggal.required' => 'Data Meninggal tidak boleh kosong',
            'tanggal_update.required'   => 'Tanggal Update tidak boleh kosong',
        ]);
        $kasus2 = new Kasus2;
        $kasus2 -> jumlah_positif        = $request -> jumlah_positif;
        $kasus2 -> jumlah_sembuh         = $request -> jumlah_sembuh;
        $kasus2 -> jumlah_meninggal      = $request -> jumlah_meninggal;
        $kasus2 -> tanggal_update = $request -> tanggal_update;
        $kasus2 -> id_rw = $request ->id_rw;
        $kasus2 -> save ();
        return redirect()->route('kasus2.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        return view('kasus2.show',compact('kasus2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $rw = Rw::all();
        return view('kasus2.edit',compact('kasus2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $kasus2 -> jumlah_positif        = $request -> jumlah_positif;
        $kasus2 -> jumlah_sembuh         = $request -> jumlah_sembuh;
        $kasus2 -> jumlah_meninggal      = $request -> jumlah_meninggal;
        $kasus2 -> tanggal_update = $request -> tanggal_update;
        $kasus2 -> save ();
        return redirect()->route('kasus2.index') -> with(['massage' => 'Data Kasus Berhasil Di Edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasus2 = Kasus2::findOrFail($id) -> delete();
        return redirect()->route('kasus2.index')->with(['massage' => 'Data Berhasil Di Hapus']);
    }
}