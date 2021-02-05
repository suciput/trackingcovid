@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show Kota</div>
                <div class="card-body"> 
                
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama provinsi</label>
                        <input type="text" name="nama_provinsi" value="{{$kota->provinsi->nama_provinsi}}" class="form-control" id="" readonly>
                    </div> 
                    <div class="mb-3">
                    <div class="from-group"></div>
                        <label for="exampleInputEmail" class="form-label">Kode kota</label>
                        <input type="number" name="kode_kota" value="{{$kota->kode_kota}}" class="form-control" name="kode_kota" readonly>
                    </div> 
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama kota</label>
                        <input type="text" name="nama_kota" value="{{$kota->nama_kota}}" class="form-control" name="nama_kota" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="btn btn-primary">KEMBALI</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
