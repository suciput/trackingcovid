<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasus2 extends Model
{
    protected $fillable = ['jumlah_positif','jumlah_sembuh','jumlah_meninggal','tanggal_update,id_rw'];
    protected $table = "kasus2s";
    public $timestamps = true;

    public function rw(){
        return $this->belongsTo('App\Models\rw','id_rw');
    }
}