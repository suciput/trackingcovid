<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $fillable = ['id_provinsi','kode_kota','nama_kota'];
    protected $table = "kotas";
    public $timestamps = true;

    public function Provinsi(){
        return $this->belongsTo('App\Models\provinsi', 'id_provinsi');

    }

   
}
