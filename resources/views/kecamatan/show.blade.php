@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show kecamatan</div>
                <div class="card-body"> 
                
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama kota</label>
                        <input type="text" name="nama_kota" value="{{$kecamatan->kota->nama_kota}}" class="form-control" id="" readonly>
                    </div> 
                    <div class="mb-3">
                    <div class="from-group"></div>
                        <label for="exampleInputEmail" class="form-label">Kode kecamatan</label>
                        <input type="number" name="kode_kecamatan" value="{{$kecamatan->kode_kecamatan}}" class="form-control" name="kode_kecamatan" readonly>
                    </div> 
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama kecamatan</label>
                        <input type="text" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" class="form-control" name="nama_kecamatan" readonly>
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
