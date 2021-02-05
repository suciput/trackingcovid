@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Kasus</div>
                
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-succes" role="alert"></div>
                    {{session('status')}}
                @endif
            <form action="{{route('kasus2.update', $kasus2->id)}}"method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Positif</label>
    <input type="text" name="jumlah_positif" value="{{$kasus2->jumlah_positif}}" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Sembuh</label>
    <input type="text" name="jumlah_sembuh" value="{{$kasus2->jumlah_sembuh}}" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Meninggal</label>
    <input type="text" name="jumlah_meninggal" value="{{$kasus2->jumlah_meninggal}}" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Update</label>
  <input type="text" name="tanggal_update" value="{{$kasus2->tanggal_update}}" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Add Data</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection