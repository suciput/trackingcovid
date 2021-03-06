@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show kelurahan</div>
                <div class="card-body"> 
                
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama kecamatan</label>
                        <input type="text" name="nama_kecamatan" value="{{$kelurahan->kecamatan->nama_kecamatan}}" class="form-control" id="" readonly>
                    </div> 
                
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama kelurahan</label>
                        <input type="text" name="nama_kelurahan" value="{{$kelurahan->nama_kelurahan}}" class="form-control" name="nama_kelurahan" readonly>
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
