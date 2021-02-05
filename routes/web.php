<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin']);

use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi',ProvinsiController::class);

use App\Http\Controllers\KotaController;
Route::resource('kota',KotaController::class);

use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan',KecamatanController::class);

use App\Http\Controllers\KelurahanController;
Route::resource('kelurahan',KelurahanController::class);

use App\Http\Controllers\RWController;
Route::resource('rw',RWController::class);

use App\Http\Controllers\Kasus2Controller;
Route::resource('kasus2',Kasus2Controller::class);

Route::view('Kasus1','livewire.home');


Route::get('test', function(){
    return view('Hai');
});
