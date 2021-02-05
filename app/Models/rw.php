<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    protected $fillable = ['nama_rw','id_kelurahan'];
    protected $table = "rws";
    public $timestamps = true;

    public function Kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','id_kelurahan');

    }
    public function kasus2(){
        return $this->hasMany('App\Models\kasus2','id_rw');


    }

  
}
