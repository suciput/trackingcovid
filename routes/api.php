<?php
use App\Models\provinsi;
use App\Models\rw;
use App\Models\kasus2;
use App\Models\kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api provinsi
Route::get('provinsi',[ProvinsiController::class,'index']);
Route::post('provinsi2',[ProvinsiController::class,'store']);


//Api kasu
Route::get('kasus2',[ApiController::class, 'index']);
Route::get('sprovinsi/{id}',[ApiController::class, 'dprovinsi']);
Route::get('sprovinsi',[ApiController::class, 'sprovinsi']);
Route::get('indonesia/provinsi/kota',[ApiController::class, 'kota']);
Route::get('indonesia/provinsi/kota/kecamatan',[ApiController::class, 'kecamatan']);
Route::get('indonesia/provinsi/kota/kecamatan/kelurahan',[ApiController::class, 'kelurahan']);
Route::get('hariini',[ApiController::class, 'hariini']);
Route::get('global',[ApiController::class, 'global']);


