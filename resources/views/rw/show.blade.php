@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show Rw</div>
                <div class="card-body"> 
                
                @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                @endif

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama kelurahan</label>
                        <input type="text" name="nama_kelurahan" value="{{$rw->kelurahan->nama_kelurahan}}" class="form-control" id="" readonly>
                    </div>  
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama rw</label>
                        <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" name="nama_rw" readonly>
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
