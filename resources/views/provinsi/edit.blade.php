@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Data Provinsi
                </div>
                <div class="card-body">
                    <form action="{{route('provinsi.update',$provinsi->id)}}" method="post">
                     <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="text" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            
                        <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection