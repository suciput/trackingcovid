<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;
    protected $fillable = ['kode_provinsi','nama_provinsi'];
    public $timestamps = true;
    protected $table = "provinsis";

public function Kota() {
    return $this->hansMany('App\Models\kota', 'id_provinsi');

  }
    
}
