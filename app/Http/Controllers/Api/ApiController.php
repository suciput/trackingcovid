<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\provinsi;
use App\Models\kasus2;
use App\Models\rw;




class ApiController extends Controller
{
    //berdasarkan id
    public function sprovinsi()
    {
        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw','=','rws.id')
        ->select('nama_provinsi',
                 DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                 DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                 DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
        ->groupBy('nama_provinsi')
        ->get();

        $data = [
            'success' => true,
            'Data Provinsi' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
            return response()->json($data,200);

    }
     // DAta global
    public function global() 
    {
        $response = Http::get('https://api.kawalcorona.com/')->json();
        $data = [
            'Success'            => true,
            'Data Api Global'   => $response,
            'Message'           => 'Data Api Global Ditampilkan'        
        ];
        return response()->json($data, 200);
    }
    
    //seluruh indonesia
    public function indonesia()
    {
        $positif = DB::table('rws')->select('kasus2s.jumlah_positif','kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
            ->join ('kasus2s','rws.id','=','kasus2s.id_rw')
            ->sum('kasus2s.jumlah_positif');
           
           
        $sembuh = DB::table('rws')->select('kasus2s.jumlah_positif','kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
            ->join ('kasus2s','rws.id','=','kasus2s.id_rw')
            ->sum('kasus2s.jumlah_sembuh');

        $meninggal = DB::table('rws')->select('kasus2s.jumlah_positif','kasus2s.jumlah_sembuh','kasus2s.jumlah_meninggal')
            ->join ('kasus2s','rws.id','=','kasus2s.id_rw')
            ->sum('kasus2s.jumlah_meninggal');

            $res = [
                'success' => true,
                'Data' => 'Data Kasus Indonesia',
                'jumlah Positif' => $positif,
                'Jumlah Sembuh' => $sembuh,
                'jumlah Meninggal' => $meninggal,
                'message' => 'Data Kasus Di tampilkan'
            ];
                return response()->json($res,200);
    }
    

    
    // berdasarkan provinsi
    public function dprovinsi($id)
    {
        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw','=','rws.id')
        ->where('provinsis.id',$id)
        ->select('nama_provinsi',
        DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
        DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
        DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
        ->groupBy('nama_provinsi')
        ->get();

        $data = [
            'success' => true,
            'Data Provinsi' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
            return response()->json($data,200);


    }
      //berdasarkan kota
       public function kota()
       {
        $tampil = DB::table('kotas')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw','=','rws.id')
        ->select('nama_kota',
                 DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                 DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                 DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
        ->groupBy('nama_kota')
        ->get();

        $data = [
            'success' => true,
            'Data Kota' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
            return response()->json($data,200);
       }

       //berdasarkan kecamatan
       public function kecamatan()
       {
        $tampil = DB::table('kecamatans')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw','=','rws.id')
        ->select('nama_kecamatan',
                 DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                 DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                 DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
        ->groupBy('nama_kecamatan')
        ->get();

        $data = [
            'success' => true,
            'Data Kota' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
            return response()->json($data,200);
       }

       //berdasarkan kelurahan
       public function kelurahan()
       {
        $tampil = DB::table('kelurahans')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw','=','rws.id')
        ->select('nama_kelurahan',
                 DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
                 DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'),
                 DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
        ->groupBy('nama_kelurahan')
        ->get();

        $data = [
            'success' => true,
            'Data Kota' => $tampil,
            'message' => 'Data Kasus Di tampilkan'
        ];
            return response()->json($data, 200);
       }
     
 
      
    }

    


  
